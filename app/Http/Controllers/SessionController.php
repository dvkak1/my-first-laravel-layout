<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
       return view('auth.login');
    }

    public function store() {
        //validate (Always make sure the code follows what's written on the field names)
        $attributes = request()->validate(['email' => ['required', 'email'],
                                                  'password' => 'required']);

        //attempt to login the user
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                  'email' => 'Sorry, those credentials do not match.'
            ]);
        }
        // Auth::attempt($attributes);

        //regenerate the session token
        request()->session()->regenerate();

        //redirect
        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
