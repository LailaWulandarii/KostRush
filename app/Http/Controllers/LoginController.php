<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $message = [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus dalam format yang valid.',
            'email.exists' => 'Email tidak terdaftar.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.password_matches_email' => 'Kata sandi salah.',
        ];
    
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'password_matches_email'],
        ], $message);
    
        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Memeriksa peran pengguna setelah berhasil masuk
            if (Auth::user()->role === 'pemilik') {
                $request->session()->regenerate();
                $id_kost = Auth::user()->id_kost;
                $request->session()->put('id_kost', $id_kost);
    
                return redirect()->route('home');
            } else {
                Auth::logout();
                return redirect()->route('login')->with('failed', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            }
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password salah');
        }
    }
    



    public function logout(Request $request)
    {
        $request->session()->forget('id_kost');
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil logout');
    }
    public function email()
    {
        return view('auth.email');
    }
}
