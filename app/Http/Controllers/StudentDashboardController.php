<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\CourseFile;
use App\Models\CourseRecording;
use App\Models\CourseZoomLink;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $customerId = session('customer_id');

        //$customer = Customer::with('bookings.course.files')->findOrFail($customerId);

        return view('StudentDashboard.home');
    }

    public function bookings()
    {
        $customerId = session('customer_id');

        $bookings = Booking::with([
            'course.files',
            'course.recordings',
            'course.zoomLinks'
        ])
        ->where('customer_id', $customerId)
        ->get();

        return view('StudentDashboard.course.main', compact('bookings'));
    }


    public function courseDetails($bookingId)
    {
        $customerId = session('customer_id');

        $booking = Booking::with('course')
            ->where('customer_id', $customerId)
            ->where('id', $bookingId)
            ->firstOrFail();

        return view('StudentDashboard.course.view', compact('booking'));
    }

    public function courseFiles($bookingId)
    {
        $booking = \App\Models\Booking::with('course.files')->findOrFail($bookingId);

        // Optional: check if the logged-in customer owns this booking
        if ($booking->customer_id !== session('customer_id')) {
            abort(403, 'Unauthorized access');
        }

        return view('StudentDashboard.course.files', compact('booking'));
    }

    public function courseRecordings($bookingId)
    {
        $booking = \App\Models\Booking::with('course.recordings')->findOrFail($bookingId);

        if ($booking->customer_id !== session('customer_id')) {
            abort(403);
        }

        return view('StudentDashboard.course.recordings', compact('booking'));
    }

    public function courseZoomLinks($bookingId)
    {
        $booking = \App\Models\Booking::with('course.zoomLinks')->findOrFail($bookingId);

        if ($booking->customer_id !== session('customer_id')) {
            abort(403);
        }

        return view('StudentDashboard.course.zoom-links', compact('booking'));
    }




}
