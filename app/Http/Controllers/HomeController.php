<?php

namespace App\Http\Controllers;
use App\Models\Kamar;
use App\Models\Kost;

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
        return view('pages.home', compact('data'));
        // return view('home');
    }

}
