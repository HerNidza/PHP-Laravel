<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // Create the user
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);
//        $attributes['password'] = bcrypt($attributes['password']); // Password is hashed in User -> setPasswordAttribute

        $user = User::create($attributes);

        session()->flash('success', "Your account has been created.");
        auth()->login($user);
        
        return redirect('/'); // ->with() same as session->flash
    }
}
