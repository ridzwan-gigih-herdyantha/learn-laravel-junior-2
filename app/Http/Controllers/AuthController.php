<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required' , 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('author')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('home');
        }

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match with our records. ',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
