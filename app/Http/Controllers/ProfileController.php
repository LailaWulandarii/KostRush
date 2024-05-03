<?php
namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

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
        $rules = [
            'name' => ['required', 'string', 'min:5', 'max:70', 'regex:/^[a-zA-Z\s\']+$/'],
            'alamat' => ['required', 'string', 'min:15', 'max:50', 'regex:/^[a-zA-Z0-9\s\.,]+$/'],
            'tgl_lahir' => ['required', 'date'],
            'no_hp' => ['required', 'string', 'min:9', 'max:13', 'regex:/^(08|\+62)\d{9,13}$/'],
            'jenis_kelamin' => ['required', Rule::in(['laki-laki', 'perempuan'])],
        ];
        $messages = [
            'required' => 'Data wajib diisi.',
            'min' => 'Data harus diisi minimal :min karakter.',
            'max' => 'Data harus diisi maksimal :max karakter.',
            'name.regex' => 'Format nama tidak valid',
            'alamat.regex' => 'Alamat hanya boleh berisi huruf, angka, titik, dan koma.',
            'no_hp.regex' => ' Nomor telepon harus dimulai dengan "08" atau "+62" dan terdiri dari 9-13 digit angka.',
            'jenis_kelamin.in' => 'Jenis kelamin harus dipilih dari pilihan yang tersedia.',
        ];

        $validatedData = $request->validate($rules, $messages);
        $user->name = $validatedData['name'];
        $user->alamat = $validatedData['alamat'];
        $user->tgl_lahir = $validatedData['tgl_lahir'];
        $user->no_hp = $validatedData['no_hp'];
        $user->jenis_kelamin = $validatedData['jenis_kelamin'];
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }


    public function changePassword(Request $request)
    {

        $rules = [
            'new_password.confirmed' => 'required',
            'new_password' => 'required|min:6|max:12|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/',
        ];

        $messages = [
            'required' => 'Data harus diisi',
            'min' => 'Data harus diisi minimal :min karakter',
            'max' => 'Data harus diisi maksimal :max karakter',
            'new_password.regex' => 'Kata sandi harus terdiri dari setidaknya satu huruf dan satu angka.',
            'new_password.confirmed' => 'Konfirmasi kata sandi tidak cocok.'
        ];
        $request->validate($rules, $messages);

        $user = Auth::user();
        // Memperbarui kata sandi baru menggunakan Query Builder
        DB::table('users')
            ->where('id', $user->id)
            ->update(['password' => Hash::make($request->new_password)]);

        return redirect()->back()->with('success', 'Kata sandi berhasil diperbarui.');
    }

    // public function destroy($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->delete();
    //     return redirect()->route('home')->with('success', 'Akun berhasil dihapus!');
    // }


    // public function updatePassword()
    // {
    //     $userEmail = session('user_email');
    //     $user = Auth::user();

    //     return view('pages.profile', compact('user'));
    // }
}