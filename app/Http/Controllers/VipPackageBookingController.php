<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Customer;
use App\Models\VipBooking;
use App\Models\VipPackage;
use Illuminate\Http\Request;
use App\Helpers\OnepayHelper;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class VipPackageBookingController extends Controller
{
    // Show VIP Package Booking Form
    public function create($id)
    {
        if (!session()->has('customer_id')) {
            return redirect()->route('customer.login')->with('error', 'Please login to book this course.');
        }

        $package = VipPackage::findOrFail($id);

        return view('frontend.book', compact('package'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'package_id' => 'required|exists:vip_packages,id',
            'payment_method' => 'required|in:Card,Bank Transfer',
            'receipt'        => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'bank_name'      => 'nullable|string|max:255',
            'bank_branch'    => 'nullable|string|max:255',
            'transfer_date'  => 'nullable|date',
        ]);

        try {
            $data = [
                'user_id'        => session('customer_id'), // Assume user is logged in
                'vip_package_id' => $request->package_id,
                'payment_method' => $request->payment_method,
                'bank_name'      => $request->bank_name,
                'bank_branch'    => $request->bank_branch,
                'transfer_date'  => $request->transfer_date,
                'status'         => 'Pending',
            ];

            // Handle receipt upload if any
            if ($request->hasFile('receipt')) {
                $data['receipt'] = $request->file('receipt')->store('vip_receipts', 'public');
            }

            // Save booking
            VipBooking::create($data);

            return redirect()->route('booking.success')->with('success', 'Your VIP booking was submitted successfully!');
        } catch (\Throwable $e) {
            Log::error('VIP Booking Failed: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while submitting your booking.');
        }
    }


    /**
     * Process the  Card Payment for VIP Packages
     */
    public function ProcessCardPayment(Request $request)
    {
        $request->validate([
            'package_id'        => 'required|exists:vip_packages,id',
        ]);
        $customerId = Session::get('customer_id');
        if(!isset($customerId)) {
            return back()->with('error', 'Please Login First.');
        }
        $customer = Customer::findOrFail($customerId);

        $fullName = $customer->name;
        $nameParts = explode(' ', $fullName);
        $firstName = $nameParts[0] ?? 'Guest';
        $lastName  = $nameParts[1] ?? 'User';

        $vipPackage   = VipPackage::findOrFail($request->package_id);
        $amount   = $vipPackage->price;
        $currency = 'LKR';

        $hash      = OnepayHelper::generateHash($currency, $amount);
        $reference = 'DSAVIP_' . date('YmdHsi');

        $response = Http::withHeaders([
            'Authorization' => config('onepay.api_key'),
        ])->post(config('onepay.base_url') . '/checkout/link/', [
            'currency'               => $currency,
            'app_id'                 => config('onepay.app_id'),
            'hash'                   => $hash,
            'amount'                 => $amount,
            'reference'              => (string)$reference,
            'customer_first_name'    => $firstName,
            'customer_last_name'     => $lastName,
            'customer_phone_number'  => $customer->contact_number,
            'customer_email'         => $customer->email,
            'transaction_redirect_url' => route('vip-payment.callback', ['reference' => $reference]), // ✅ Pass reference
            'additional_data'         => (string)$reference, // ✅ extra safe to store reference here too
        ]);

        if ($response->successful() && isset($response['data']['gateway']['redirect_url'])) {
            $redirectUrl = $response['data']['gateway']['redirect_url'];

            Log::info('Redirecting to OnePay', ['url' => $redirectUrl]);

            // Save booking with Pending status immediately
            $data = [
                'user_id'        => $customerId, // Assume user is logged in
                'vip_package_id' => $request->package_id,
                'payment_method' => "Card",
                'status'         => 'Pending',
                'reference'      => $reference
            ];
            VipBooking::create($data);

            return redirect()->away($redirectUrl);
        }

        Log::error('OnePay Payment Link Failed', ['response' => $response->json()]);

        return back()->with('error', 'Failed to create OnePay link.')->withErrors($response->json());
    }

    /**
     * Card Payment Redirecrt Handle After Payment
     */
    public function callback(Request $request)
    {
        $reference = $request->query('reference');

        if (!$reference) {
            Log::warning('No reference found in callback URL.');
            return view('frontend.vip-callback')->with([
                'status'    => 'unknown',
                'message'   => 'We could not find your booking reference. Please contact support.',
                'reference' => null,
            ]);
        }

        $vipBooking = VipBooking::where('reference', $reference)->first();

        if ($vipBooking && $vipBooking->status === 'Confirmed') {
            return view('frontend.vip-callback')->with([
                'status'    => 'success',
                'message'   => 'Your payment was successful! Thank you for join with us.',
                'reference' => $reference,
            ]);
        } elseif ($vipBooking && $vipBooking->status === 'Pending') {
            return view('frontend.vip-callback')->with([
                'status'    => 'pending',
                'message'   => 'Your payment is being processed. Please wait a moment while we confirm it.',
                'reference' => $reference,
            ]);
        } else {
            return view('frontend.vip-callback')->with([
                'status'    => 'unknown',
                'message'   => 'We could not find your booking details. Please contact support.',
                'reference' => $reference,
            ]);
        }
    }
}
