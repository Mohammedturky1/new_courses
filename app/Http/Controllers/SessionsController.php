<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // validate the request
        $attributes = request()->validate([

            'email' => 'required|exists:users,email',
//            'email' => 'required|email',
            'password' => 'required'
        ]);




        if (! auth()->attempt($attributes)) {


            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
        }



        // session fixation
        session()->regenerate();

        // redirect with a success flash message
        return redirect('/')->with('success', 'Welcome Back To Your App!');

    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'GoodBye!');
    }
}
