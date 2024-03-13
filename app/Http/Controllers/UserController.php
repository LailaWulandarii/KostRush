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

        $user->save();

        return redirect()->route('penghuni')->with('success', 'Data pengguna berhasil diupdate');
    }

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('status', 'data berhasil dihapus');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.create_penghuni', compact('user'));
    }
}
