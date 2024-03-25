<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // tambahkan ini untuk menggunakan model User

class TransaksiController extends Controller
{
    public function index()
    {
        // Mengambil data penghuni kost dengan peran 'penyewa'
        $penyewa = User::where('role', 'penyewa')->get();

        // Mengirim data ke view
        return view('pages.transaksi', ['penyewa' => $penyewa]);
    }
    public function riwayat()
    {
        // Mengambil data penghuni kost dengan peran 'penyewa'
        $penyewa = User::where('role', 'penyewa')->get();

        // Mengirim data ke view
        return view('pages.historyTransaksi', ['penyewa' => $penyewa]);
    }
}
