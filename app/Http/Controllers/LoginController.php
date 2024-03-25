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

            // Tambahkan kode berikut untuk mendapatkan ID Kost dari pengguna yang berhasil login
            $id_kost = Auth::user()->id_kost;

            // Tambahkan kode berikut untuk menyetel nilai 'id_kost' dalam sesi
            $request->session()->put('id_kost', $id_kost);

            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password salah');
        }
    }

    public function email()
    {
        return view('auth.email');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('id_kost');
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil logout');
    }
}
