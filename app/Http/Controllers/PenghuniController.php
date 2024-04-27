<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Kost;
use App\Models\Kamar;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class PenghuniController extends Controller
{
    // Method untuk menampilkan data penghuni dalam antarmuka pengguna web
    public function index()
    {
        $user = Auth::user();

        // Mendapatkan data penghuni kost berdasarkan pengguna yang sedang login
        $penghuni = User::where('role', 'penyewa')
            ->where('id_kost', $user->id_kost)
            ->with('penghuniKamar', 'transaksis') // Menggunakan relasi one-to-one untuk penghuni kamar
            ->get();

        // Kemudian Anda bisa melewatkan data penghuni ke view untuk ditampilkan
        return view('pages.penghuni', compact('penghuni'));
    }


    public function update(Request $request, $id)
    {
        $message = [
            'required' => 'Data wajib diisi!',
            'min' => 'Data harus diisi minimal :min karakter!',
            'max' => 'Data harus diisi maksimal :max karakter!',
        ];

        $request->validate([
            'alamat' => 'required|string|min:15|max:255',
            'no_hp' => ['required', 'string', 'max:15', 'regex:/^(08|\+62)\d{9,13}$/'],
            'pekerjaan' => 'required|string|min:15|max:255',
        ], $message);

        $user = User::findOrFail($id);
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->pekerjaan = $request->pekerjaan;
        $user->save();

        $penghuni = User::where('role', 'penyewa')
            ->where('id_kost', Auth::user()->id_kost) // Mengambil pengguna sesuai dengan ID kost pengguna yang sedang login
            ->with(['kamar', 'transaksi'])
            ->get();

        return view('pages.penghuni', compact('penghuni'))->with('success', 'Pengguna berhasil diperbarui.');
    }
}
