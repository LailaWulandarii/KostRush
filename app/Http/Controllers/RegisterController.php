<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Kost;

class RegisterController extends Controller
{
    public function registerAkunForm()
    {
        return view('auth.register');
    }

    public function registerAkun(Request $request)
    {
        $message = [
            'required' => 'Data wajib diisi!',
            'min' => 'Data harus diisi minimal :min karakter!',
            'max' => 'Data harus diisi maksimal :max karakter!',
            'unique' => 'Data sudah digunakan!',
            'email' => 'Format email tidak valid!',
            'regex' => 'Format data tidak valid!',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:6', 'max:255', 'confirmed', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/'],
            // 'alamat' => 'required|string|min:15|max:255',
            // 'tgl_lahir' => 'required|date',
            // 'no_hp' => ['required', 'string', 'max:15', 'regex:/^(08|\+62)\d{9,13}$/'],
            // 'jenis_kelamin' => 'required',
        ], $message);

        if ($validator->fails()) {
            return redirect()->route('register_akun_form')->withErrors($validator)->withInput()->with('failed', 'Registrasi gagal. Silakan coba lagi.');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'alamat' => $request->alamat,
            // 'tgl_lahir' => $request->tgl_lahir,
            // 'no_hp' => $request->no_hp,
            // 'jenis_kelamin' => $request->jenis_kelamin,
            'role' => 'pemilik',
        ]);

        if ($user) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->route('login');
            }
        }
        return redirect()->route('register')->with('failed', 'Registrasi gagal. Silakan coba lagi.');
    }
}
