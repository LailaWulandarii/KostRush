<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Tambahkan impor untuk Auth
use App\Models\Kamar; // Tambahkan impor untuk model Kost
use App\Models\fotoKamar; // Tambahkan impor untuk model Kost
use App\Models\Kost; // Tambahkan impor untuk model Kost
use Illuminate\Support\Facades\Hash;

class KamarController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        // Mendapatkan data kost yang terkait dengan pengguna yang sedang login
        $kost = $user->kost;

        // Ambil data kamar yang terkait dengan kost tersebut
        $kamars = $kost->kamars;

        // Mengirimkan data ke view, termasuk jika data kamar kosong
        return view('pages.kamar')->with('kamars', $kamars);
    }


    public function store(Request $request)
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
            'nama_kamar' => 'required|string|max:255',
            'status_kamar' => 'required|in:kosong,terisi',
            'fasilitas' => 'required|string',
            'harga' => 'required|numeric|min:0',
        ], $message);

        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        // Membuat data kamar baru berdasarkan data yang diterima dari formulir
        $kamar = new Kamar();
        $kamar->nama_kamar = $request['nama_kamar'];
        $kamar->status_kamar = $request['status_kamar'];
        $kamar->fasilitas = $request['fasilitas'];
        $kamar->harga = $request['harga'];
        $kamar->id_kost = $user->kost->id; // Menggunakan ID kost dari pengguna yang sedang login
        $kamar->save();

        // if ($request->has('foto_kamar')) {
        //     foreach ($request->file('foto_kamar') as $file) {
        //         $fileName = time() . '_' . $file->getClientOriginalName();
        //         $path = 'fotoKamar/kamar';
        //         $file->move($path, $fileName);

        //         $fotoKamar = new fotoKamar();
        //         $fotoKamar->id_kamar = $kamar->id_kamar;
        //         $fotoKamar->foto_kamar = $fileName;
        //         $fotoKamar->save();
        //     }
        // }

        // Redirect kembali ke halaman yang sesuai setelah berhasil menambahkan kamar
        return redirect()->back()->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'fasilitas' => 'nullable|string',
            'harga' => 'nullable|numeric',
            'status_kamar' => 'required|in:terisi,kosong',
        ]);

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
