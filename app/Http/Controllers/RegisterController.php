<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\User;


use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //

    public function create()
    {
        return view('register.create');
    }

    //store is where we create a company

    public function store()
    {
        $attributes = request()->validate([

            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:7|max:255',
        ]);

        //if validation fails the lines below will never be reached

        Company::create($attributes);

        return redirect('/');
    }
}
