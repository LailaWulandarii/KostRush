<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan impor untuk Auth
use App\Models\Kost; // Tambahkan impor untuk model Kost

class KostController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Mendapatkan ID pengguna yang sedang login
        $data = Kost::where('id', $userId)->get(); // Mengambil data kost berdasarkan ID pengguna
        return view('pages.kost', compact('data')); // Sertakan data dalam panggilan view()
    }
}
