<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Kost;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;
use App\Mail\RegisterMail;

class RegisterController extends Controller
{
    public function registerAkunForm()
    {
        return view('auth.register');
    }


    public function registerAkun(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:30|regex:/^[a-zA-Z\s\']+$/',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:6', 'max:12', 'confirmed', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/'],
        ], [
            'required' => 'Data harus diisi',
            'min' => 'Data harus diisi minimal :min karakter',
            'max' => 'Data harus diisi maksimal :max karakter',
            'unique' => 'Email sudah digunakan, Harap gunakan email lain',
            'email' => 'Format email tidak valid',
            'name.regex' => 'Format nama tidak valid',
            'password.regex' => 'Kata sandi harus berisi setidaknya satu huruf dan satu angka',
            'password.confirmed' => 'Konfirmasi kata sandi harus sama dengan kata sandi',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register_akun_form')
                ->withErrors($validator)
                ->withInput()
                ->with('failed', 'Registrasi gagal. Silakan coba lagi.');
        }
        // Buat pengguna baru dengan verifikasi token
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pemilik',
            // 'remember_token' => Str::random(40),
        ]);
        return redirect()->route('home')
            ->with('failed', 'Registrasi gagal. Silakan coba lagi.');
        // Mail::to($user->email)->send(new RegisterMail($user));
        // if ($user) {
        //     // Kirim email verifikasi
        //     Mail::to($user->email)->send(new VerificationEmail($user));

        //     return redirect()->route('login')
        //         ->with('success', 'Registrasi berhasil. Silakan cek email Anda untuk verifikasi.');
        // }

        // return redirect()->route('register')
        //     ->with('failed', 'Registrasi gagal. Silakan coba lagi.');
    }

    public function verifyEmail(Request $request)
    {
        // Ambil pengguna berdasarkan token verifikasi
        $user = User::where('verification_token', $request->token)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Token verifikasi tidak valid.');
        }

        // Tandai email pengguna sebagai diverifikasi
        $user->email_verified_at = now();
        $user->save();

        // Login pengguna secara otomatis setelah verifikasi
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Email Anda telah berhasil diverifikasi.');
    }
}
