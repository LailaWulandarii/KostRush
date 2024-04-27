<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan impor untuk Auth
use App\Models\Kost; // Tambahkan impor untuk model Kost
use App\Models\User;

class KostController extends Controller
{
    public function create()
    {
        return view('pages.daftarKost');
    }
    public function index()
    {
        ///API KOST GET ALL
        // $kost = Kost::all();
        // return $kost;

        // Mengambil ID pengguna yang sedang login
        $id_user = Auth::id();

        // Mengambil data kost berdasarkan ID pengguna yang sedang login
        $kost = Kost::where('id_user', $id_user)->first();
        if ($kost) {
            return view('pages.kost', compact('kost'));
        } else {
            return view('pages.errorKost')->with('error', 'Data kost tidak ditemukan.');
        }
    }

    public function store(Request $request)
    {
        // Aturan validasi dan pesan
        $rules = [
            'nama_kost' => ['required', 'string', 'min:5', 'max:255', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'fasilitas' => ['required', 'string', 'min:5', 'max:255', 'regex:/^[a-zA-Z0-9\s.,()]+$/'],
            'peraturan' => ['required', 'string', 'min:5', 'max:255', 'regex:/^[a-zA-Z0-9\s.,()]+$/'],
            'alamat' => ['required', 'string', 'min:15', 'max:255'], // Menghapus regex untuk alamat
            'tipe' => ['required', 'string', 'in:putra,putri,campur'], // Menambahkan aturan untuk tipe
        ];

        $messages = [
            'required' => 'Data wajib diisi.',
            'min' => 'Data harus diisi minimal :min karakter.',
            'max' => 'Data harus diisi maksimal :max karakter.',
            'nama_kost.regex' => 'Nama Kost hanya boleh berisi huruf, angka, dan spasi.',
            'fasilitas.regex' => 'Fasilitas hanya boleh berisi huruf, angka, spasi, titik, koma, dan tanda kurung.',
            'peraturan.regex' => 'Peraturan hanya boleh berisi huruf, angka, spasi, titik, koma, dan tanda kurung.',
            'tipe.in' => 'Tipe Kost tidak valid.',
        ];

        // Validasi data
        $validatedData = $request->validate($rules, $messages);
        // Mengambil pengguna yang sedang login
        $user = Auth::user();


        // Membuat dan menyimpan instance baru dari model Kost
        $kostId = DB::table('kosts')->insertGetId([
            'nama_kost' => $validatedData['nama_kost'],
            'fasilitas' => $validatedData['fasilitas'],
            'peraturan' => $validatedData['peraturan'],
            'alamat' => $validatedData['alamat'],
            'tipe' => $validatedData['tipe'],
            'id_user' => $user->id,
        ]);

        // Memperbarui kolom id_user dan id_kost di tabel users
        DB::table('users')->where('id', $user->id)->update(['id_kost' => $kostId]);

        // Mengambil data kost yang baru saja dibuat
        $kost = DB::table('kosts')->where('id', $kostId)->first();

        return view('pages.kost', compact('kost'))->with('success', 'Data Kost berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kost' => 'required|string|max:255',
            'fasilitas' => 'required|string',
            'peraturan' => 'required|string',
            'alamat' => 'required|string|max:255',
        ]);

        $kost = Kost::findOrFail($id);
        $kost->nama_kost = $request->nama_kost;
        $kost->fasilitas = $request->fasilitas;
        $kost->peraturan = $request->peraturan;
        $kost->alamat = $request->alamat;
        $kost->save();

        return view('pages.kost', compact('kost'))->with('success', 'Data Kost berhasil disimpan.');
    }
}
