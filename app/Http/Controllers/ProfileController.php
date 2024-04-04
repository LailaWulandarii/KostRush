<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $userEmail = session('user_email');
        $user = Auth::user();

        return view('pages.profile', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->alamat = $request->input('alamat');
        $user->tgl_lahir = $request->input('tgl_lahir');
        $user->no_hp = $request->input('no_hp');
        $user->jenis_kelamin = $request->input('jenis_kelamin');

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Tambahkan logika tambahan jika diperlukan, seperti logout pengguna atau membersihkan data terkait.

        return redirect()->route('home')->with('success', 'Akun berhasil dihapus!');
    }


    // public function updatePassword()
    // {
    //     $userEmail = session('user_email');
    //     $user = Auth::user();

    //     return view('pages.profile', compact('user'));
    // }
}
