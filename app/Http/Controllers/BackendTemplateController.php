<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Booking;

class BackendTemplateController extends Controller
{
    public function index()
    {
        return view('AdminDashboard.home');
    }

    // Show list of customers
    public function index1()
    {
        $customers = Customer::latest()->paginate(10);
        return view('AdminDashboard.customers.index', compact('customers'));
    }

    // Toggle status (active/inactive)
    public function toggleStatus($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->status = !$customer->status;
        $customer->save();

        return redirect()->route('admin.customers.index')->with('success', 'Customer status updated.');
    }

    // Show customer details
    public function show($id)
    {
        $customer = Customer::with(['bookings.course'])->findOrFail($id);
        return view('AdminDashboard.customers.show', compact('customer'));
    }


    // Delete customer
    public function destroy($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();

            return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
        } catch (\Throwable $e) {
            Log::error('Customer Deletion Failed: ' . $e->getMessage());
            return redirect()->route('admin.customers.index')->with('error', 'Failed to delete customer.');
        }
    }

    public function pendingOrders()
    {
        $bookings = Booking::with(['customer', 'course'])
            ->where('status', 'Pending')
            ->orderBy('id', 'desc')
            ->get();
        return view('AdminDashboard.orders.pending', compact('bookings'));
    }

    public function halfPaidOrders()
    {
        $bookings = Booking::with(['customer', 'course'])
            ->where('status', 'Half')
            ->orderBy('id', 'desc')
            ->get();

        return view('AdminDashboard.orders.half', compact('bookings'));
    }


    public function successOrders()
    {
        $bookings = Booking::with(['customer', 'course'])
            ->where('status', 'Confirmed')
            ->orderBy('id', 'desc')
            ->get();
        return view('AdminDashboard.orders.success', compact('bookings'));
    }

    public function updateOrderStatus($id, $status)
{
    $booking = Booking::findOrFail($id);

    if (!in_array($status, ['Confirmed', 'Half'])) {
        return redirect()->back()->with('error', 'Invalid status value.');
    }

    $booking->status = $status;
    $booking->save();

    return redirect()->back()->with('success', "Booking marked as $status successfully.");
}


    public function showOrder($id)
    {
        $booking = Booking::with(['customer', 'course'])->findOrFail($id);
        return view('AdminDashboard.orders.show', compact('booking'));
    }

}
