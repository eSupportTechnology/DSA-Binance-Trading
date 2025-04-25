<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Helpers\OnepayHelper;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class BookingController extends Controller
{
    public function showForm($id)
    {
        if (!session()->has('customer_id')) {
            return redirect()->route('customer.login')->with('error', 'Please login to book this course.');
        }

        $course = Course::findOrFail($id);
        return view('frontend.booking', compact('course'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'course_id' => 'required|exists:courses,course_id',
            'contact_number' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'payment_method' => 'required|in:Card,Bank Transfer',
            'payment_status' => 'required|in:half,full',
            'receipt_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'bank_name' => 'nullable|string|max:100',
            'bank_branch' => 'nullable|string|max:100',
            'transfer_date' => 'nullable|date',
        ]);
    
        $customerId = Session::get('customer_id');
        $customer = Customer::findOrFail($customerId);

        $fullName = session('customer_name', 'Guest User');
        $nameParts = explode(' ', $fullName);
        $firstName = $nameParts[0] ?? 'Guest';
        $lastName = $nameParts[1] ?? 'User';
    
        $customer->update([
            'contact_number' => $request->contact_number,
            'address' => $request->address,
        ]);
    
        $receiptPath = null;
    
        if ($request->payment_method === 'Bank Transfer' && $request->hasFile('receipt_path')) {
            $receiptPath = $request->file('receipt_path')->store('receipts', 'public');
        }
    
        // 🟨 If Bank Transfer, proceed normally
        if ($request->payment_method === 'Bank Transfer') {
            Booking::create([
                'customer_id'    => $customer->user_id,
                'course_id'      => $request->course_id,
                'payment_method' => $request->payment_method,
                'payment_status' => $request->payment_status,
                'receipt_path'   => $receiptPath,
                'bank_name'      => $request->bank_name,
                'bank_branch'    => $request->bank_branch,
                'transfer_date'  => $request->transfer_date,
                'status'         => 'Pending',
            ]);
    
            return redirect()->route('booking.success');
        }
    
        // 🟩 If Card Payment → redirect to OnePay
        $course = Course::findOrFail($request->course_id);
        $amount = $request->payment_status === 'full' ? $course->total_price : $course->first_payment;
        $currency = 'LKR';

        $hash = OnepayHelper::generateHash($currency, $amount);
        $reference = 'DSA_' . uniqid();

        Log::info('Initiating OnePay Payment', [
            'amount' => $amount,
            'reference' => $reference,
        ]);

        $response = Http::withHeaders([
            'Authorization' => config('onepay.api_key'),
        ])->post(config('onepay.base_url') . '/checkout/link/', [
            'currency' => $currency,
            'app_id' => config('onepay.app_id'),
            'hash' => $hash,
            'amount' => $amount,
            'reference' => $reference,
            'customer_first_name' => $firstName,
            'customer_last_name' => $lastName,
            'customer_phone_number' => $customer->contact_number,
            'customer_email' => $customer->email,
            'transaction_redirect_url' => route('payment.callback'),
            'additionalData' => 'course_' . $course->course_id,
        ]);

        if ($response->successful() && isset($response['data']['gateway']['redirect_url'])) {
            $redirectUrl = $response['data']['gateway']['redirect_url'];

            Log::info('Redirecting to OnePay', [
                'url' => $redirectUrl,
            ]);

            Booking::create([
                'customer_id'    => $customer->user_id,
                'course_id'      => $request->course_id,
                'payment_method' => 'Card',
                'payment_status' => $request->payment_status,
                'status'         => 'Payment Pending',
                'reference'      => $reference,
            ]);

            return redirect()->away($redirectUrl);
        }

        // If failed, log full response
        Log::error('OnePay Payment Link Failed', [
            'response' => $response->json(),
        ]);
            
        return back()->with('error', 'Failed to create OnePay link.')->withErrors($response->json());
    }

    public function callback(Request $request)
    {
        // You can log or show a payment confirmation page
        return view('payment.callback', ['data' => $request->all()]);
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



}

