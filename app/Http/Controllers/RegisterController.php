<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // tambahkan ini untuk menggunakan model User

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            $credentials = $request->only('email', 'password'); 
            if (Auth::attempt($credentials)) {
                return redirect()->route('home');
            }
        }

        return redirect()->route('login')->with('failed', 'Registrasi gagal. Silakan coba lagi.');
    }}
