<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showLogin()
    {
        return view("auth.login");
    }

    public function register()
    {
        return view("auth.register");
    }

    public function store()
    {

    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // if (Auth::guard('admin')->attempt($credentials)) {
        //     return redirect()->route('monitoring');
        // }

        // return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        // Auth::guard('admin')->logout();
        // return redirect()->route('promotive');
    }
}
