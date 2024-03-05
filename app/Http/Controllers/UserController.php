<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create_penghuni()
    {
        return view('pages.create_penghuni');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'penyewa'; // Tetapkan peran secara langsung
        $user->alamat = $request->alamat;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->no_hp = $request->no_hp;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->save();

        return redirect()->route('penghuni')->with('success', 'Pengguna berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.create_penghuni', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Tambahkan field lain sesuai kebutuhan

        $user->save();

        return redirect()->route('penghuni')->with('success', 'Data pengguna berhasil diupdate');
    }

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Tambahkan respons JSON jika ingin memberikan respons ke frontend
        return redirect()->back()->with('status', 'data berhasil dihapus');
    }
    // public function show($id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('pages.create_penghuni', ['user' => $user]);
    // }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.create_penghuni', compact('user'));
    }
    
}
