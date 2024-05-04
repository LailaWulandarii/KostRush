<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil ID user yang login
        $userId = Auth::user()->id;
    
        // Ambil semua Transaksi dengan eager loading untuk User, Kamar, dan Kost
        $transaksis = Transaksi::with(['user', 'kamar', 'kost'])->where('id', $userId)->get();
    
        // Periksa apakah ada Transaksi
        if ($transaksis->isEmpty()) {
            return response()->json([
                'pesan' => 'Tidak ada Transaksi yang ditemukan untuk user ini.',
            ], 404); // Kode status Tidak Ditemukan
        }
    
        // Format dan kembalikan data Transaksi dengan detail User, nama Kamar, dan nama Kost terkait
        $transaksisTerformat = [];
        foreach ($transaksis as $transaksi) {
            $transaksiTerformat = [
                'id_transaksi' => $transaksi->id_transaksi,
                'id_kost' => $transaksi->id_kost,
                'id_kamar' => $transaksi->id_kamar,
                // 'id_user' => $transaksi->id_user,
                'biaya' => $transaksi->biaya,
                'tanggal_masuk' => $transaksi->tanggal_masuk,
                'tanggal_keluar' => $transaksi->tanggal_keluar,
                'status_transaksi' => $transaksi->status_transaksi,
                'user' => [
                    'id_user' => $transaksi->user->id_user,
                    'nama' => $transaksi->user->nama,
                    'no_hp' => $transaksi->user->no_hp,
                    'alamat' => $transaksi->user->alamat,
                    'pekerjaan' => $transaksi->user->pekerjaan,
                ],
                'nama_kamar' => $transaksi->kamar->nama_kamar,
                'nama_kost' => $transaksi->kost->nama_kost, // Akses nama kost dari relasi Kost
            ];
            $transaksisTerformat[] = $transaksiTerformat;
        }
    
        // Kembalikan data Transaksi yang diformat sebagai respons JSON
        return response()->json([
            'transaksis' => $transaksisTerformat,
        ], 200); // Kode status OK
    }
    
    
}
