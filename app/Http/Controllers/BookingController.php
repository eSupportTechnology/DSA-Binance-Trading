<?php

namespace App\Http\Controllers;

use App\Models\CallCenter;
use App\Models\Course;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\VipBooking;
use Illuminate\Http\Request;
use App\Helpers\OnepayHelper;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class BookingController extends Controller
{
    public function showForm($id, Request $request)
    {
        if (!session()->has('customer_id')) {
            return redirect()->route('customer.login')->with('error', 'Please login to book this course.');
        }

        $course = Course::findOrFail($id);
        $callCenters = CallCenter::all();

        $selectedCallCenterId = $request->get('call_center_id');
        $selectedCallCenter = null;

        if ($selectedCallCenterId && $selectedCallCenterId !== 'other') {
            $selectedCallCenter = CallCenter::find($selectedCallCenterId);
        }

        return view('frontend.booking', compact('course', 'callCenters', 'selectedCallCenter', 'selectedCallCenterId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id'        => 'required|exists:courses,course_id',
            'contact_number'   => 'required|string|max:15',
            'address'          => 'nullable|string|max:255',
            'call_center_id'   => 'required',
            'payment_method'   => 'required|in:Card,Bank Transfer',
            'payment_status'   => 'required|in:half,full',
            'receipt_path'     => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'bank_name'        => 'nullable|string|max:100',
            'bank_branch'      => 'nullable|string|max:100',
            'transfer_date'    => 'nullable|date',
        ]);

        if ($request->call_center_id !== 'other') {
            $request->validate([
                'call_center_id' => 'exists:call_centers,id'
            ]);
        }

        $customerId = Session::get('customer_id');
        $customer = Customer::findOrFail($customerId);

        $fullName = session('customer_name', 'Guest User');
        $nameParts = explode(' ', $fullName);
        $firstName = $nameParts[0] ?? 'Guest';
        $lastName  = $nameParts[1] ?? 'User';

        $customer->update([
            'contact_number' => $request->contact_number,
            'address'        => $request->address,
        ]);

        $receiptPath = null;
        if ($request->payment_method === 'Bank Transfer' && $request->hasFile('receipt_path')) {
            $receiptPath = $request->file('receipt_path')->store('receipts', 'public');
        }

        $callCenterId = $request->call_center_id === 'other' ? null : $request->call_center_id;

        if ($request->payment_method === 'Bank Transfer') {
            Booking::create([
                'customer_id'    => $customer->user_id,
                'course_id'      => $request->course_id,
                'call_center_id' => $callCenterId,
                'payment_method' => $request->payment_method,
                'payment_status' => $request->payment_status,
                'receipt_path'   => $receiptPath,
                'bank_name'      => $request->bank_name,
                'bank_branch'    => $request->bank_branch,
                'transfer_date'  => $request->transfer_date,
                'status'         => 'Confirmed',
            ]);

            return redirect()->route('booking.success');
        }

        $course   = Course::findOrFail($request->course_id);
        $amount   = $request->payment_status === 'full' ? $course->total_price : $course->first_payment;
        $currency = 'LKR';

        $hash      = OnepayHelper::generateHash($currency, $amount);
        $reference = 'DSA_' . uniqid();

        Log::info('Initiating OnePay Payment', [
            'amount'    => $amount,
            'reference' => $reference,
        ]);

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
            'transaction_redirect_url' => route('payment.callback', ['reference' => $reference]),
            'additional_data'         => (string)$reference,
        ]);

        if ($response->successful() && isset($response['data']['gateway']['redirect_url'])) {
            $redirectUrl = $response['data']['gateway']['redirect_url'];

            Log::info('Redirecting to OnePay', ['url' => $redirectUrl]);

            Booking::create([
                'customer_id'    => $customer->user_id,
                'course_id'      => $request->course_id,
                'call_center_id' => $callCenterId,
                'payment_method' => 'Card',
                'payment_status' => $request->payment_status,
                'reference'      => $reference,
                'status'         => 'Pending',
            ]);

            return redirect()->away($redirectUrl);
        }

        Log::error('OnePay Payment Link Failed', ['response' => $response->json()]);

        return back()->with('error', 'Failed to create OnePay link.')->withErrors($response->json());
    }


    public function callback(Request $request)
    {
        Log::info('User Redirected to Payment Callback Page', [
            'query' => $request->query(),
            'input' => $request->all(),
            'raw_body' => $request->getContent(),
        ]);

        // ✅ Correct: get 'reference' from query parameters
        $reference = $request->query('reference');

        if (!$reference) {
            Log::warning('No reference found in callback URL.');
            return view('frontend.callback')->with([
                'status'    => 'unknown',
                'message'   => 'We could not find your booking reference. Please contact support.',
                'reference' => null,
            ]);
        }

        $booking = Booking::where('reference', $reference)->first();

        if ($booking && $booking->status === 'Confirmed') {
            return view('frontend.callback')->with([
                'status'    => 'success',
                'message'   => 'Your payment was successful! Thank you for booking with us.',
                'reference' => $reference,
            ]);
        } elseif ($booking && $booking->status === 'Pending') {
            return view('frontend.callback')->with([
                'status'    => 'pending',
                'message'   => 'Your payment is being processed. Please wait a moment while we confirm it.',
                'reference' => $reference,
            ]);
        } else {
            return view('frontend.callback')->with([
                'status'    => 'unknown',
                'message'   => 'We could not find your booking details. Please contact support.',
                'reference' => $reference,
            ]);
        }
    }


    public function notify(Request $request)
    {
        Log::info('OnePay Webhook Received:', ['data' => $request->all()]);

        $transactionId = $request->input('transaction_id');
        $status        = $request->input('status');  // 1 = success
        $statusMessage = $request->input('status_message');
        $reference     = $request->input('additional_data');  // This is your booking reference

        if (!$transactionId || !$reference) {
            Log::error('Webhook received without transaction_id or reference.');
            return response()->json(['error' => 'Missing transaction_id or reference'], 400);
        }

        // ✅ Find booking by reference
        $booking = Booking::where('reference', $reference)->first();

        if (!$booking) {
            Log::error('Booking not found for reference: ' . $reference);
            return response()->json(['error' => 'Booking not found'], 404);
        }

        if ($booking->status === 'Paid') {
            Log::info('Booking already marked as Paid for reference: ' . $reference);
            return response()->json(['message' => 'Booking already processed'], 200);
        }

        if ($status == 1 && strtolower($statusMessage) === 'success') {
            $booking->update(['status' => 'Paid']);

            Log::info('Booking updated to Paid for reference: ' . $reference);
            return response()->json(['message' => 'Booking updated successfully'], 200);
        }

        Log::warning('Payment failed or not successful.', [
            'transaction_id'  => $transactionId,
            'status'          => $status,
            'status_message'  => $statusMessage
        ]);

        return response()->json(['message' => 'Payment failed or canceled'], 200);
    }


    public function pending()
    {
        $bookings = Booking::with('customer', 'course')
            ->where('status', 'Pending')
            ->latest()
            ->get();

        return view('AdminDashboard.bookings.pending', compact('bookings'));
    }

    // Show all approved bookings
    public function approved()
    {
        $bookings = Booking::with('customer', 'course')
            ->where('status', 'Confirmed')
            ->latest()
            ->get();

        return view('AdminDashboard.bookings.approved', compact('bookings'));
    }

    // Approve a booking
    public function approve($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'Confirmed';
        $booking->save();

        return redirect()->back()->with('success', 'Booking approved successfully.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Booking deleted successfully.');
    }

    public function show($id)
    {
        $booking = Booking::with(['customer', 'course'])->findOrFail($id);
        return view('AdminDashboard.bookings.show', compact('booking'));
    }

    public function success()
    {
        return view('AdminDashboard.bookings.success');
    }

    public function failed()
    {
        return view('AdminDashboard.bookings.failed');
    }

    /**
     * Get payment info
     */
    public function getPaymentInfo(Request $request)
    {
        $response = $request->json()->all();
        $reference = $response['additional_data'];
        $status = $response['status_message'];

        if(str_contains($reference, "DSAVIP")) {
            $vipBooking = VipBooking::where('reference', $reference)->first();
            if($vipBooking) {
                if($status == "SUCCESS") {
                    $vipBooking->status = 'Confirmed';
                    $vipBooking->save();
                }
            }
            return;
        }

        $booking = Booking::where('reference', $reference)->first();
        if($booking) {
            if($status == "SUCCESS") {
                $booking->status = 'Confirmed';
                $booking->save();
            }
        }
    }


}

