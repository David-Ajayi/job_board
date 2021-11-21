<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
class SessionsController extends Controller
{
    //
    public function create()
    {
        return view('sessions.create');
    }
//attempt to logging user based on credentials and authenticate
    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            //regenerate session upon login to

            return redirect('/')->with('success', 'Welcome Back!');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'

            //the error message is displayed below the email part of the form
        ]);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
