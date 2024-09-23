<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class SessionController extends Controller
{
    
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]); 

        if (!auth()->attempt($attributes)) {
           throw ValidationException::withMessages([
               'email' => 'Sorry, your credentials do not match.',
           ]);
        }

        request()->session()->regenerate();

        return redirect('/');

    }

    public function destroy()
    {
        auth()->logout();       
        return redirect('/');
    }
}
