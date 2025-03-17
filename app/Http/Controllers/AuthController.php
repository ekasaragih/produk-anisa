<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use Illuminate\Support\Facades\Session;
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
            'dob_manual' => 'nullable|string|regex:/^\d{2}-\d{2}-\d{4}$/',
            'password' => 'required|min:6|confirmed'
        ]);

        $dob = $request->dob_manual 
        ? \Carbon\Carbon::createFromFormat('d-m-Y', $request->dob_manual)->format('Y-m-d') 
        : $request->dob;

        $user = User::create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request->email,
            'phone_num' => $request->phone_num,
            'dob' => $dob,
            'password' => Hash::make($request->password)
        ]);

        Profile::create([
            'user_id' => $user->id,
            'nama' => $user->full_name,
        ]);

        return redirect()->route('user.login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('welcome');
        }

        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('welcome_guest');
    }
}
