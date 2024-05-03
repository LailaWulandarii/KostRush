<?php

namespace App\Http\Controllers;

use App\Models\foto_kamar;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Tambahkan impor untuk Auth
use App\Models\Kamar; // Tambahkan impor untuk model Kost
use App\Models\Kost; // Tambahkan impor untuk model Kost
use Illuminate\Support\Facades\Hash;
use App\Models\FotoKamar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KamarController extends Controller
{


    public function index()
    {

        $user = Auth::user();

        // Get the associated kost for the logged-in user
        $kost = $user->kost;

        // Get the rooms associated with the kost
        $kamars = $kost->kamars;

        // Mencari foto kamar berdasarkan ID kamar
        $fotoKamar = [];

        foreach ($kamars as $kamar) {
            // Menggunakan Query Builder untuk mendapatkan ID kamar
            $kamarId = DB::table('kamars')->where('id', $kamar->id)->value('id');

            // Membangun URL ke gambar
            $fotoUrl = url("storage/foto_kamar/{$kamarId}.jpg");

            // Simpan URL ke dalam array
            $fotoKamar[$kamar->id_kamar] = $fotoUrl;
        }

        return view('pages.kamar', compact('kamars', 'fotoKamar'));
    }

    // public function tambahDataKamar(Request $request)
    // {
    //     // Validasi data dari form
    //     $validatedData = $request->validate([
    //         'nama_kamar' => 'required|string',
    //         'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi foto (maksimal 2MB)
    //     ]);

    //     // Inisialisasi variabel id_kamar
    //     $id_kamar = null;

    //     // Transaksi Database
    //     DB::transaction(function () use ($validatedData, $request, &$id_kamar) {
    //         // Simpan data kamar
    //         $id_kamar = DB::table('kamars')->insertGetId([
    //             'nama_kamar' => $validatedData['nama_kamar'],
    //         ]);

    //         // Simpan foto-foto kamar
    //         foreach ($request->file('foto') as $foto) {
    //             $path = $foto->store('public/foto_kamar'); // Simpan foto ke dalam direktori public/foto_kamar
    //             DB::table('foto_kamar')->insert([
    //                 'id_kamar' => $id_kamar,
    //                 'foto_kamar' => $path // Ubah 'path' menjadi 'foto_kamar'
    //             ]);
    //         }
    //     });

    //     // Ambil semua foto kamar setelah proses penyimpanan
    //     $fotoKamar = DB::table('foto_kamar')->where('id_kamar', $id_kamar)->get();

    //     return view('pages.kosong', compact('fotoKamar'))->with('success', 'Data kamar berhasil disimpan');
    // }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Data :attribute wajib diisi.',
            'min' => 'Data :attribute harus diisi minimal :min karakter.',
            'max' => 'Data :attribute harus diisi maksimal :max karakter.',
            'nama_kamar.regex' => 'Data :attribute hanya boleh berisi huruf, angka, dan spasi.',
            'fasilitas.regex' => 'Data :attribute hanya boleh berisi huruf, angka, spasi, titik, koma, dan tanda kurung.',
            'harga.numeric' => 'Data :attribute harus berupa angka.',
            'status_kamar.in' => 'Data :attribute harus berisi "kosong" atau "terisi".',
            'foto.*.image' => 'Data :attribute harus berupa file gambar.',
            'foto.*.mimes' => 'Data :attribute harus berupa file dengan format: jpeg, png, jpg, gif.',
            'foto.*.max' => 'Data :attribute harus kurang dari :max kilobita.',
        ];

        $request->validate([
            'nama_kamar' => 'required|string|min:5|max:20|regex:/^[a-zA-Z0-9\s\']+$/',
            'status_kamar' => 'required|in:kosong,terisi',
            'fasilitas' => 'required|string|min:5|max:70|regex:/^[a-zA-Z0-9\s\':.,\/!]+$/',
            'harga' => 'required|numeric|min:0',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi foto (maksimal 2MB)
        ], $messages);

        // Memulai transaksi database
        DB::transaction(function () use ($request, &$id_kamar) {
            // Simpan data kamar
            $user = Auth::user();
            $kamar = new Kamar();
            $kamar->nama_kamar = $request['nama_kamar'];
            $kamar->status_kamar = $request['status_kamar'];
            $kamar->fasilitas = $request['fasilitas'];
            $kamar->harga = $request['harga'];
            $kamar->id_kost = $user->kost->id;
            $kamar->save();

            // Simpan foto-foto kamar
            foreach ($request->file('foto') as $foto) {
                $path = $foto->store('public/foto_kamar'); // Simpan foto ke dalam direktori public/foto_kamar
                DB::table('foto_kamar')->insert([
                    'id_kamar' => $kamar->id, // Menggunakan ID kamar yang baru saja disimpan
                    'foto_kamar' => $path
                ]);
            }
        });

        return redirect()->back()->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $message = [
            'required' => 'Data :attribute wajib diisi.',
            'min' => 'Data :attribute harus diisi minimal :min karakter.',
            'max' => 'Data :attribute harus diisi maksimal :max karakter.',
            'nama_kamar.regex' => 'Data :attribute hanya boleh berisi huruf, angka, dan spasi.',
            'fasilitas_kamar.regex' => 'Data :attribute hanya boleh berisi huruf, angka, spasi, titik, koma, dan tanda kurung.',
            'harga.numeric' => 'Data :attribute harus berupa angka.',
            'harga.min' => 'Data :attribute harus diisi dengan angka minimal :min.',
            'foto_kamar.required' => 'Harap pilih satu atau lebih foto kamar.',
            'foto_kamar.mimes' => 'Format file yang diterima untuk :attribute adalah PNG, JPG, atau JPEG.',
            'foto_kamar.max' => 'Ukuran file :attribute tidak boleh melebihi 2 MB.',
        ];
        $request->validate([
            'nama_kamar' => 'required|string|min:5|max:20|regex:/^[a-zA-Z0-9\s\']+$/',
            'status_kamar' => 'required|in:kosong,terisi',
            'fasilitas' => 'required|string|min:5|max:70|regex:/^[a-zA-Z0-9\s\':.,\/!]+$/',
            'harga' => 'required|numeric|min:0',
        ], $message);

        // Cari data kamar yang akan diupdate
        $kamar = Kamar::findOrFail($id);

        // Update data kamar
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->fasilitas = $request->fasilitas;
        $kamar->harga = $request->harga;
        $kamar->status_kamar = $request->status_kamar;
        $kamar->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan berhasil
        return redirect()->back()->with('success', 'Data kamar berhasil diupdate.');
    }

    public function destroy(int $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();
        return redirect()->back()->with('status', 'data berhasil dihapus');
    }
}
