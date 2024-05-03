<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\User;
use App\Models\Transaksi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home()
    {
        $userEmail = session('user_email');
        // Mendapatkan ID kost dari pengguna yang sedang login
        $idKost = Auth::user()->id_kost;
        $kamars = Kamar::where('id_kost', $idKost)
            ->get();        // Mengambil jumlah kamar kosong berdasarkan ID kost
        $jumlahKamarKosong = Kamar::where('id_kost', $idKost)
            ->where('status_kamar', 'kosong')
            ->count();
        $penyewas = User::where('role', 'penyewa')
            ->where('id_kost', $idKost)
            ->get()
            ->count();
        $transaksis = Transaksi::where('status_transaksi', 'menunggu')
            ->with('user', 'kamar')
            ->get();

        return view('pages.home', compact('penyewas', 'jumlahKamarKosong', 'transaksis', 'kamars'));
        // return view('pages.home', compact('user', 'jumlahKamarKosong', 'jumlahPenghuniAktif'));
    }    // public function index()
    // {
    //     return "Selamat Routing Anda Sudah Benar";
    // }
    // public function index()
    // {
    //     $data = User::get();
    //     $data = [
    //         'status' => 200,
    //         'user' => $data
    //     ];
    //     return response()->json($data, 200);
    //     // return view('home');
    // }
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|min:5|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => ['required', 'string', 'min:6', 'max:255', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/'],
    //         'alamat' => 'required|string|min:15|max:255',
    //         'tgl_lahir' => 'required|date',
    //         'no_hp' => ['required', 'string', 'max:15', 'regex:/^(08|\+62)\d{9,13}$/'],
    //         'jenis_kelamin' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         $data = [
    //             "status" => 422,
    //             "message" => $validator->messages()
    //         ];
    //         return response()->json($data, 422);
    //     } else {
    //         $user = new User();
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->password = bcrypt($request->password);
    //         $user->role = 'penyewa';
    //         $user->alamat = $request->alamat;
    //         $user->tgl_lahir = $request->tgl_lahir;
    //         $user->no_hp = $request->no_hp;
    //         $user->jenis_kelamin = $request->jenis_kelamin;
    //         $user->save();

    //         $data = [
    //             'status' => 200,
    //             'message' => 'Data sudah diupload'
    //         ];
    //         return response()->json($data, 200);
    //     }
    // }
    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|min:5|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => ['required', 'string', 'min:6', 'max:255', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/'],
    //         'alamat' => 'required|string|min:15|max:255',
    //         'tgl_lahir' => 'required|date',
    //         'no_hp' => ['required', 'string', 'max:15', 'regex:/^(08|\+62)\d{9,13}$/'],
    //         'jenis_kelamin' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         $data = [
    //             "status" => 422,
    //             "message" => $validator->messages()
    //         ];
    //         return response()->json($data, 422);
    //     } else {
    //         $user = User::find($id);
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->password = bcrypt($request->password);
    //         $user->role = 'penyewa';
    //         $user->alamat = $request->alamat;
    //         $user->tgl_lahir = $request->tgl_lahir;
    //         $user->no_hp = $request->no_hp;
    //         $user->jenis_kelamin = $request->jenis_kelamin;
    //         $user->save();

    //         $data = [
    //             'status' => 200,
    //             'message' => 'Data sudah diupdate'
    //         ];
    //         return response()->json($data, 200);
    //     }
    // }
    // public function destroy($id)
    // {

    //     $user = User::find($id);
    //     $user->delete();
    //     $data = [
    //         'status' => 200,
    //         'message' => 'Data sudah dihapus'
    //     ];
    //     return response()->json($data, 200);
    // }
}
