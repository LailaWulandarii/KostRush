<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Kost;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class PenghuniController extends Controller
{
    // Method untuk menampilkan data penghuni dalam antarmuka pengguna web
    public function index()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Mengambil data kost yang terhubung dengan akun pengguna
        $kost = Kost::where('id', $userId)->first();

        // Jika pengguna memiliki kost
        if ($kost) {
            // Mengambil daftar kamar yang terkait dengan kost milik pengguna
            $kamarIds = $kost->kamars()->pluck('id_kamar'); // Mengambil ID kamar yang terkait dengan kost

            // Mengambil penghuni (penyewa) dari kamar-kamar tersebut
            $penghuni = User::whereIn('id_kamar', $kamarIds)->get();

            // Mengirim data penghuni ke tampilan
            return view('pages.penghuni', compact('penghuni'));
        } else {
            // Jika pengguna tidak memiliki kost, mungkin menampilkan pesan atau mengarahkan ke halaman lain
            return redirect()->route('pages.home');
        }
    }

    public function store(Request $request)
    {
        $message = [
            'required' => 'Data wajib diisi!',
            'min' => 'Data harus diisi minimal :min karakter!',
            'max' => 'Data harus diisi maksimal :max karakter!',
        ];
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:6', 'max:255', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/'],
            'alamat' => 'required|string|min:15|max:255',
            'tgl_lahir' => 'required|date',
            'no_hp' => ['required', 'string', 'max:15', 'regex:/^(08|\+62)\d{9,13}$/'],
            'jenis_kelamin' => 'required',
        ], $message);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'penyewa';
        $user->alamat = $request->alamat;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->no_hp = $request->no_hp;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->save();

        return view('pages.penghuni')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $message = [
            'required' => 'Data wajib diisi!',
            'min' => 'Data harus diisi minimal :min karakter!',
            'max' => 'Data harus diisi maksimal :max karakter!',
        ];

        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'alamat' => 'required|string|min:15|max:255',
            'tgl_lahir' => 'required|date',
            'no_hp' => ['required', 'string', 'max:15', 'regex:/^(08|\+62)\d{9,13}$/'],
            'jenis_kelamin' => 'required',
        ], $message);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->no_hp = $request->no_hp;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->save();

        return view('pages.penghuni')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('status', 'data berhasil dihapus');
    }
}
