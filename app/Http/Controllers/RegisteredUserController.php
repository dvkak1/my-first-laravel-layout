<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
       //validate
       $validatedRequests = request()->validate([
                                                            'first_name' => ['required'],
                                                            'last_name' => ['required'],
                                                            'email' => ['required', 'email'],
                                                            'password' => ['required', Password::min(6), 'confirmed'],
                                                        ]);

        // dd($validatedRequests);
       //create the user (do not use extra brackets)

       $user = User::create($validatedRequests);
       //log in
       Auth::login($user);
       //redirect somewhere
       return redirect('/jobs');
    }
}
