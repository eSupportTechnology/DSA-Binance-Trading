<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

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
            'receipt_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'bank_name' => 'nullable|string|max:100',
            'bank_branch' => 'nullable|string|max:100',
            'transfer_date' => 'nullable|date',
        ]);

        $customerId = Session::get('customer_id');
        $customer = Customer::findOrFail($customerId);

        // Update customer contact & address if not already stored
        $customer->update([
            'contact_number' => $request->contact_number,
            'address' => $request->address,
        ]);

        // Handle receipt upload if Bank Transfer
        $receiptPath = null;
        if ($request->payment_method === 'Bank Transfer' && $request->hasFile('receipt_path')) {
            $receiptPath = $request->file('receipt_path')->store('receipts', 'public');
        }

        // Create Booking
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

