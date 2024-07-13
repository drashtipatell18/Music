<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    public function showForgetPasswordForm()
    {
        return view('auth.forgetpass');
    }
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $email = $request->email;

        $user = User::where('email', $email)->first();

        if ($user) {
            // OTP generate
            $otp = mt_rand(100000, 999999);
            $user->otp = $otp;

            session(['otp' => $otp]);

            $user->remember_token = Str::random(40);
            $user->save();

            session(['reset_email' => $user->email]);

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->route('verify.otp')->with('success', 'OTP sent successfully.');
        } else {
            return back()->with('danger', 'User not found.');
        }
    }
    public function verifyOTPForm()
    {
        $email = session('reset_email');
        // if (!$email) {
        //     return redirect()->route('forget.password')->with('danger', 'Session expired. Please try again.');
        // }
        return view('auth.otpPage', ['email' => $email]);
    }

    public function verifyOTP(Request $request)
    {
        $email = session('reset_email');
        $user = User::where('email', $email)->first();
        $otp = $user->otp;

        if ($request->otp == $otp) {
            // OTP is valid
           dd('success');
        }

        return back()->withErrors(['otp' => 'Invalid OTP.']);
    }

    public function resetPassword()
    {
        return view('auth.resetpass');
    }

}
