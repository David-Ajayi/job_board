<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\User;



use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

            'name' => ['required','min:2','max:255',Rule::unique('users','name')],
            'username' => ['required','min:2','max:255',Rule::unique('users','username')],

            'email' => ['required','email','max:255',Rule::unique('companies','email')],
            'password' => 'required|min:7|max:255',
        ]);

        //if validation fails the lines below will never be reached

       $company =
           $user = User::create($attributes);
       auth()->login($user);

//        return redirect('/');
        return redirect('/')->with('success', 'Your account has been created.');
        //'sucesss is our key and 'Your account has been created.' is the value
    }
}
