<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Impor model User
use App\Models\Transaksi; // Impor model Transaksi

class TransaksiController extends Controller
{

    public function index()
    {
        // Status yang diizinkan
        $allowedStatus = ['belum_bayar', 'menunggu_verifikasi', 'diterima', 'ditolak'];

        // Mengambil pengguna yang memiliki status tertentu
        $penyewa = User::where('role', 'penyewa')
            ->whereHas('transaksis') // Memastikan pengguna memiliki transaksi
            ->get();

        // Mengambil data transaksi yang sesuai dengan kondisi pengguna
        $transaksi = Transaksi::whereHas('user', function ($query) use ($allowedStatus) {
            $query->where('role', 'penyewa')
                ->whereIn('status', $allowedStatus); // Menyesuaikan kondisi dengan status yang diizinkan
        })
            ->get();

        // Jika tidak ada data yang memenuhi kondisi, arahkan ke halaman lain
        if ($penyewa->isEmpty() || $transaksi->isEmpty()) {
            return view('pages.kosong');
        }

        return view('pages.transaksi', [
            'penyewa' => $penyewa,
            'transaksi' => $transaksi,
        ]);
    }
    public function show($id)
    {
        $penghuni = User::find($id);
        $transaksis = Transaksi::where('user_id', $id)->get();
        return view('pages.transaksi', compact('penghuni', 'transaksis'));
    }

    public function riwayat()
    {
        // Mengambil data penghuni kost dengan peran 'penyewa'
        $penyewa = User::where('role', 'penyewa')->get();

        // Mengirim data ke view
        return view('pages.historyTransaksi', ['penyewa' => $penyewa]);
    }
}
