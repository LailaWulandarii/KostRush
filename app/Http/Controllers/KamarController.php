<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Tambahkan impor untuk Auth
use App\Models\Kamar; // Tambahkan impor untuk model Kost
use App\Models\Kost; // Tambahkan impor untuk model Kost
use Illuminate\Support\Facades\Hash;

class KamarController extends Controller
{
    public function create()
    {
        // Tampilkan halaman formulir untuk menambahkan pengguna baru
        return view('pages.createKamar');
    }
    public function index()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Mengambil data kost milik pengguna yang sedang login
        $kost = Kost::where('id', $userId)->first();

        // Jika pengguna memiliki kost
        if ($kost) {
            // Mengambil daftar kamar yang terkait dengan kost milik pengguna
            $kamars = $kost->kamars;

            // Mengirim data kamar ke tampilan
            return view('pages.kamar', compact('kamars'));
        } else {
            // Jika pengguna tidak memiliki kost, mungkin menampilkan pesan atau mengarahkan ke halaman lain
            return redirect()->route('pages.home');
        }
    }
    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);

    }

    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'fasilitas_kamar' => 'nullable|string',
            'harga_harian' => 'nullable|numeric',
            'harga_bulanan' => 'nullable|numeric',
            'status' => 'required|in:terisi,kosong',
        ]);

        // Cari data kamar yang akan diupdate
        $kamar = Kamar::findOrFail($id);

        // Update data kamar
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->fasilitas_kamar = $request->fasilitas_kamar;
        $kamar->harga_harian = $request->harga_harian;
        $kamar->harga_bulanan = $request->harga_bulanan;
        $kamar->status = $request->status;
        $kamar->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan berhasil
        return redirect()->route('pages.kamar')->with('success', 'Data kamar berhasil diupdate.');
    }

    public function destroy(int $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return redirect()->back()->with('status', 'data berhasil dihapus');
    }
}
