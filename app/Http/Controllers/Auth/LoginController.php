<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'usn' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('usn', $request->usn)
                    ->where('is_active', 1)
                    ->first();

        // Compare plain password with last_name
        if ($user && $user->last_name === $request->password) {
            Auth::login($user, $request->has('remember'));

            // update last login timestamp
            $user->update(['last_login' => now()]);

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'usn' => 'Invalid username or password',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}


