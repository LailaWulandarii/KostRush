<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kost;

class KostController extends Controller
{
    public function index()
    {
        $id_user = Auth::id();
        $kost = Kost::where('id_user', $id_user)->first();
        return view('pages.kost', compact('kost'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_kost' => ['required', 'string', 'min:5', 'max:35', 'regex:/^[a-zA-Z0-9\s\']+$/'],
            'fasilitas' => ['required', 'string', 'min:5', 'max:70', 'regex:/^[a-zA-Z0-9\s\':.,\/!]+$/'],
            'peraturan' => ['required', 'string', 'min:5', 'max:70', 'regex:/^[a-zA-Z0-9\s\':.,\/!]+$/'],
            'alamat' => ['required', 'string', 'min:15', 'max:50', 'regex:/^[a-zA-Z0-9\s\.,]+$/'],
            'tipe' => ['required', 'string', 'in:putra,putri,campur'],
            'kecamatan' => ['required', 'string', 'in:Bagor,Baron,Berbek,Gondang,Jatikalen,Kertosono,Lengkong,
            Loceret,Nganjuk,Ngetos,Ngluyu,Ngronggot,Pace,Patianrowo,Plemahan,Prambon,Rejoso,Sawahan,Sukomoro,Tanjunganom'],
        ];

        $messages = [
            'required' => 'Data wajib diisi.',
            'min' => 'Data harus diisi minimal :min karakter.',
            'max' => 'Data harus diisi maksimal :max karakter.',
            'nama_kost.regex' => 'Nama Kost hanya boleh berisi huruf, angka, tanda petik tunggal, dan spasi.',
            'fasilitas.regex' => 'Format fasilitas tidak valid.',
            'peraturan.regex' => 'Format peraturan tidak valid.',
            'alamat.regex' => 'Alamat hanya boleh berisi huruf, angka, titik, dan koma.',
        ];

        $validatedData = $request->validate($rules, $messages);
        $user = Auth::user();
        $kostId = DB::table('kosts')->insertGetId([
            'nama_kost' => $validatedData['nama_kost'],
            'fasilitas' => $validatedData['fasilitas'],
            'peraturan' => $validatedData['peraturan'],
            'alamat' => $validatedData['alamat'],
            'tipe' => $validatedData['tipe'],
            'kecamatan' => $validatedData['kecamatan'],
            'id_user' => $user->id,
        ]);
        DB::table('users')->where('id', $user->id)->update(['id_kost' => $kostId]);
        $kost = DB::table('kosts')->where('id', $kostId)->first();

        return view('pages.kost', compact('kost'))->with('success', 'Data Kost berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama_kost' => ['required', 'string', 'min:5', 'max:25', 'regex:/^[a-zA-Z0-9\s\']+$/'],
            'fasilitas' => ['required', 'string', 'min:5', 'max:70', 'regex:/^[a-zA-Z0-9\s\':.,\/!]+$/'],
            'peraturan' => ['required', 'string', 'min:5', 'max:70', 'regex:/^[a-zA-Z0-9\s\':.,\/!]+$/'],
            'alamat' => ['required', 'string', 'min:15', 'max:50', 'regex:/^[a-zA-Z0-9\s\.,]+$/'],
            'tipe' => ['required', 'string', 'in:putra,putri,campur'],
        ];

        $messages = [
            'required' => 'Data wajib diisi.',
            'min' => 'Data harus diisi minimal :min karakter.',
            'max' => 'Data harus diisi maksimal :max karakter.',
            'nama_kost.regex' => 'Nama Kost hanya boleh berisi huruf, angka, dan spasi.',
            'fasilitas.regex' => 'Data tidak sesuai format.',
            'peraturan.regex' => 'Data tidak sesuai format.',
            'alamat.regex' => 'Alamat hanya boleh berisi huruf, angka, titik, dan koma.',
        ];
        $validatedData = $request->validate($rules, $messages);

        $kost = Kost::findOrFail($id);
        $kost->nama_kost = $request->nama_kost;
        $kost->fasilitas = $request->fasilitas;
        $kost->peraturan = $request->peraturan;
        $kost->alamat = $request->alamat;
        $kost->save();

        return view('pages.kost', compact('kost'))->with('success', 'Data Kost berhasil disimpan.');
    }
}
