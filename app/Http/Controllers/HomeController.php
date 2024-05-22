<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $userEmail = session('user_email');
        $idKost = Auth::user()->id_kost;
        $kamars = Kamar::where('id_kost', $idKost)
            ->get();
        $jumlahKamarKosong = Kamar::where('id_kost', $idKost)
            ->where('status_kamar', 'kosong')
            ->count();
        $penyewas = User::where('role', 'penyewa')
            ->where('id_kost', $idKost)
            ->count();
        $transaksis = Transaksi::where('status_transaksi', 'menunggu')
            ->with('user', 'kamar')
            ->get();

        return view('pages.home', compact('penyewas', 'jumlahKamarKosong', 'transaksis', 'kamars'));
    }
}
