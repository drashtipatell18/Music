<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Events\PasswordReset;


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

            try {
                Mail::to($user->email)->send(new ForgotPasswordMail($user));
            } catch (\Exception $e) {
                return response()->json(['error' => 'Failed to send OTP email'], 500);
            }

            // return redirect()->route('verify.otp')->with('success', 'OTP sent successfully.');

            return response()->json(['success' => 'OTP sent successfully.'], 200);
        } else {
            // return back()->with('danger', 'User not found.');
            return response()->json(['error' => 'User not found.'], 404);
        }
    }
    public function verifyOTPForm()
    {
        $email = session('reset_email');
        if (!$email) {
            return redirect()->route('show.forgetpassword')->with('danger', 'Session expired. Please try again.');
        }
        return view('auth.otpPage', ['email' => $email]);
    }

    public function verifyOTP(Request $request)
    {
        // $email = session('reset_email');
        // $user = User::where('email', $email)->first();

        // if (!$user) {
        //     return back()->with('danger', 'User not found.'); // Handle case where user is not found
        // }


        // $otp = $user->otp;
        // $newOTP = explode(",",$otp);
        // $inputOTP = str_split($otp);

        // if ($request->otp == $inputOTP) {
        //     return back()->with('success', 'OTP Successs.');
        // }
        // else{
        //     return back()->with('danger', 'OTP not found.');
        // }

        $request->validate([
            'email' => 'required|email',
            'otp' => 'required'
        ]);


        $email = $request->input('email');
        $otp = $request->input('otp');
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }
        if ($user->otp === $otp) {
            $user->save();
            return response()->json(['message' => 'OTP Verified successfully.'], 200);
        } else {
            return response()->json(['error' => 'Invalid OTP.'], 400);
        }

    }

    // public function resend()
    // {
    //     $email = session('reset_email');
    //     $user = User::where('email', $email)->first();

    //     if (!$user) {
    //         return back()->with('danger', 'Session expired. Please request a new OTP.');
    //     }

    //     $otp = mt_rand(100000, 999999);
    //     $user->otp = $otp;
    //     $user->save();
    //     Mail::to($user->email)->send(new ForgotPasswordMail($user));

    //     return back()->with('success', 'New OTP sent successfully.');
    // }


    public function resend(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $otp = mt_rand(100000, 999999);
        $user->otp = $otp;
        $user->save();

        try {
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send OTP email'], 500);
        }
        return response()->json(['message' => 'New OTP sent successfully'], 200);
    }

    public function resetPassword()
    {
        return view('auth.resetpass');
    }

    public function passwordReset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        $user->password = Hash::make($request->input('password'));
        $user->remember_token = Str::random(60);
        $user->save();
        return response()->json(['message' => 'Password has been reset.'], 200);
    }


}
