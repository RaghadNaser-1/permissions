<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Your code to fetch data or perform actions for the dashboard goes here
        // For example, retrieve user data or display dashboard content
        return view('dashboard');

    }
    public function home()
    {
        // Your code to fetch data or perform actions for the dashboard goes here
        // For example, retrieve user data or display dashboard content
        // return view('home')->with('message', __('messages.welcome'));
        $messages = [
            'message' => __('messages.welcome'),
            // Other messages...
        ];

        return view('home')->with($messages);


    }

}
