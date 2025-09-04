<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'usn'           => 'required|string|max:255|unique:users,usn',
            'email'         => 'required|email|unique:users,email',
            'phone_number'  => 'nullable|string|max:255',
            'role'          => 'required|string',
        ]);

        $user = User::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'usn'           => $request->usn,
            // store hash too (future proof)
            'password_hash' => bcrypt($request->last_name),
            'email'         => $request->email,
            'phone_number'  => $request->phone_number,
            'role'          => $request->role,
            'is_active'     => 1,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
