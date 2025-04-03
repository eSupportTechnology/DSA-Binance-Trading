<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationCode;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use App\Services\DialogSMSService;


class CustomerAuthController extends Controller
{
    // Show Registration Page
    public function showRegister()
    {
        return view('frontend.signup');
    }

    // Handle Registration
    public function register(Request $request)
    {
        try{
        //dd($request);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:customers,email',
            'contact_number' => 'required|string|unique:customers,contact_number',
            'password' => 'required|min:6|confirmed',
        ]);
        //dd($request);
        $code = rand(100000, 999999);

        session([
            'pending_customer' => [
                'name' => $request->name,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'password' => Hash::make($request->password),
                'verification_code' => $code,
            ]
        ]);

        // Send SMS (Use your Dialog or Richmo function)
        $this->sendSMS($request->contact_number, "Your DSA Academy verification code is: $code");

        return redirect()->route('customer.verify.code.form')->with('success', 'Verification code sent.');


    } catch (\Throwable $e) {
        Log::error('Registration Error: ' . $e->getMessage());
        return back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
    }

    public function showCodeForm()
    {
        return view('emails.verify-code-page');
    }

    public function verifyCode(Request $request)
    {
        //dd($request);
        $request->validate(['code' => 'required|numeric']);

        $data = session('pending_customer');

        if (!$data || $data['verification_code'] != $request->code) {
            return back()->with('error', 'Invalid or expired code.');
        }
    
        $nextId = Customer::max('user_id') + 1; // use 'id' or your actual PK column
        $stuId = 'DSA' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        $customer = Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'contact_number' => $data['contact_number'],
            'email_verified_at' => now(),
            'status' => 1,
            'stu_id' => $stuId,
        ]);
    
        session()->forget('pending_customer');

        return redirect()->route('customer.login')->with('success', 'Registration complete. Please log in.');
    }


    public function sendSMS($mobile, $message)
    {
        try {
            $dialog = new DialogSMSService();
            $dialog->sendSMS($mobile, $message);
        } catch (\Exception $e) {
            Log::error("Dialog SMS Error: " . $e->getMessage());
            throw new \Exception("SMS sending failed.");
        }
    }


    
    
    

    // Show Login Page
    public function showLogin()
    {
        return view('frontend.login');
    }

    // Handle Login
    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email|exists:customers,email',
            'password' => 'required',
        ]);
        //dd($request);

        $customer = Customer::where('email', $request->email)->first();

        if ($customer && Hash::check($request->password, $customer->password)) {
            // Custom session
            session([
                'customer_id' => $customer->user_id,
                'customer_name' => $customer->name,
                'customer_email' => $customer->email,
                'contact_number' => $customer->contact_number,
            ]);
            return redirect()->route('frontend.home')->with('success', 'Login successful!');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials.');
        }
    }

    // Logout
    public function logout()
    {
        Session::forget(['customer_id', 'customer_name']);
        return redirect()->route('customer.login')->with('success', 'Logged out successfully.');
    }
}
