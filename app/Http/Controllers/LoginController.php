<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // tambahkan ini untuk menggunakan model User

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('user_email', $request->email);

            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password salah');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil logout');
    }
}
