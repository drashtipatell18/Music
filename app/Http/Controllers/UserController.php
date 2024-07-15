<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function users()
    {
        $users = User::where('role',1)->get();
        return response()->json([
            'success' => true,
            'message' => 'Users Data successfully',
            'result' => $users
        ], 200);

    }

    public function userInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);

        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password')),
            'role' => 1,
        ]);

        // session()->flash('success', 'User added successfully!');
        // return redirect()->route('user');
        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);

    }

    public function userEdit($id)
    {
        $user = User::find($id);
        return view('user.create_user', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation fails',
                'error' => $validator->errors()
            ], 401);
        }

        $users = User::find($id);
        if (is_null($users)) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $users->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $users,
        ], 200);

        // session()->flash('success', 'User Update successfully!');
        // return redirect()->route('user');
    }

    public function userDestroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete();
        // session()->flash('danger', 'User Delete successfully!');
        // return redirect()->back();

        return response()->json(['message' => 'User deleted successfully']);
    }

    // public function myProfile()
    // {
    //     if (Auth::check()) {
    //         $userid = Auth::user()->id;
    //         $users = User::with('role')->find($userid);
    //     }
    //     $roles = Role::pluck('role_name', 'id');
    //     return view('admin.user_profile', compact('users', 'roles'));
    // }

    // public function editProfile($id)
    // {
    //     if (Auth::check()) {
    //         $users = User::find($id);
    //     }
    //     return view('admin.user_profile', compact('users'));
    // }

    public function Profileupdate(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'mobile_no' => 'required',
        ]);

        $users = User::find($id);

        $users->update([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'address'   => $request->input('address'),
            'mobile_no'  => $request->input('mobile_no'),
        ]);

        return redirect()->route('myprofile')->with('success', 'Profile updated successfully');
    }

}
