<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ExampleMail;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }



    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|same:password_confirmation',
            'password_confirmation' => 'required|string|min:8|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1,
            "api_token" => 0
        ]);

        event(new Registered($user));

        auth()->login($user);



        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    public function forgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email'
        ]);

        if($validator->fails())
        {
            return response()->json(['success' => false, 'message' => 'Validation error', 'errors' => $validator->errors()], 400);
        }
        $email = new ExampleMail();
        Mail::to($request->input('email'))->send($email);

        return response()->json(['otp' => $email->randomNumber]);
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['success' => false, 'message' => 'Validation error', 'errors' => $validator->errors()], 400);
        }

        $user = User::where('email', $request->input('email'))->first();

        $user->update([
            'password' => Hash::make($request->input('password'))
        ]);

        return response()->json(['success' => true, 'message' => 'Password Updated Successfully.'], 200);
    }


}
