<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // Validate the request
        $user = request()->validate([
            'email' => 'required|email',
            'password' => 'required'

        ]);
        // Attempt to authenticate and login the user based on credentials provided
        if (auth()->attempt($user)) { // This other then confirming you provided correct password and email it signs you in
            session()->regenerate();
            // Redirect with flash
            return redirect('/')->with('success', 'Welcome Back, ' . auth()->user()->name);
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified']); // Check @error for key
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }


}
