<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


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

    public function store(Request $request) {
        $request->validate([
            'full_name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_num' => 'nullable|string',
            'dob' => 'nullable|date',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request->email,
            'phone_num' => $request->phone_num,
            'dob' => $request->dob,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('user.login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
