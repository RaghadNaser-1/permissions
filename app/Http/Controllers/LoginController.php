<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // Check if the user is already authenticated, if yes, redirect to the dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // If the user is not authenticated, show the login form
        return view('login');
    }

    public function processLogin(Request $request)
    {
        // Validate the login form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication successful, redirect to the dashboard
            return redirect()->route('dashboard');
        } else {
            // Authentication failed, redirect back to the login form with an error message
            return redirect()->route('login')->with('error', 'Invalid credentials. Please try again.');
        }
    }
}
