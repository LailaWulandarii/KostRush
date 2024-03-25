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
        return view('pages.create_kamar');
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
    
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari formulir
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            // tambahkan validasi untuk atribut lainnya seperti alamat, tanggal lahir, nomor HP, dll.
        ]);

        // Simpan data pengguna baru ke dalam tabel database
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // tambahkan atribut lainnya seperti alamat, tanggal lahir, nomor HP, dll.
        $user->save();

        // Redirect pengguna setelah pengguna berhasil ditambahkan
        return redirect()->route('data_pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }
    //
}
