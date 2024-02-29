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
    public function home()
    {
        $data = User::get();
        return view('home', compact('data'));
        // return view('home');
    }
    public function main()
    {
        $data = User::get();
        return view('main', compact('data'));
        // return view('home');
    }
    public function login()
    {
        $data = User::get();
        return view('login', compact('data'));
        // return view('home');
    }
    public function data_penghuni()
    {
        $data = User::get();
        return view('data_penghuni', compact('data'));
        // return view('home');
    }
    public function data_kamar()
    {
        $data = User::get();
        return view('data_kamar', compact('data'));
        // return view('home');
    }
    public function data_kost()
    {
        $data = User::get();
        return view('data_kost', compact('data'));
        // return view('home');
    }
    public function transaksi()
    {
        $data = User::get();
        return view('transaksi', compact('data'));
        // return view('home');
    }
    public function profile()
    {
        // Logika atau pengambilan data untuk profil

        return view('profile'); // Ganti 'profile' dengan nama file view yang sesuai
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
