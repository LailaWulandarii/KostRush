<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function index()
    // {
    //     return "Selamat Routing Anda Sudah Benar";
    // }
    public function index()
    {
        $data = User::get();
        return view('index', compact('data'));
        // return view('home');
    }
    public function login()
    {
        $data = User::get();
        return view('login', compact('data'));
        // return view('home');
    }
    public function peminjaman()
    {
        $data = User::get();
        return view('peminjaman', compact('data'));
        // return view('home');
    }
    public function katalog()
    {
        $data = User::get();
        return view('katalog', compact('data'));
        // return view('home');
    }
    public function profile()
    {
        // Logika atau pengambilan data untuk profil

        return view('profile'); // Ganti 'profile' dengan nama file view yang sesuai
    }
    public function donasi()
    {
        $data = User::get();
        return view('donasi', compact('data'));
        // return view('home');
    }
    public function verifikasi()
    {
        $data = User::get();
        return view('verifikasi', compact('data'));
        // return view('home');
    }
    public function dashboard()
    {
        // $data = User::get();
        // return view('index', compact('data'));
        // return view('dashboard', compact('data'));
        return view('dashboard');
    }
    public function create()
    {
        // $data = User::get();
        // return view('index', compact('data'));
        // return view('home', compact('data'));
        return view('create');
    }
}
