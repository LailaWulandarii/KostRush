<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kost;
use App\Models\foto_kost;
use Illuminate\Support\Facades\Validator;

class KostController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua Kost dengan eager loading untuk FotoKost
        $kosts = Kost::with('fotoKost')->get(); // Sesuaikan hubungan model jika diperlukan

        // Periksa apakah ada Kost
        if ($kosts->isEmpty()) {
            return response()->json([
                'pesan' => 'Tidak ada Kost yang ditemukan.',
            ], 404); // Kode status Tidak Ditemukan
        }

        // Format dan kembalikan data Kost dengan FotoKost terkait
        $kostsTerformat = [];
        foreach ($kosts as $kost) {
            $kostTerformat = [
                'id_kost' => $kost->id_kost,
                'nama_kost' => $kost->nama_kost,
                'alamat' => $kost->alamat,
                'kecamatan' => $kost->kecamatan,
                'peraturan' => $kost->peraturan,
                'fasilitas' => $kost->fasilitas,
                'id_user' => $kost->id_user,
                'tipe' => $kost->tipe,
                'foto_kost' => $kost->fotoKost->map(function ($foto) {
                    return [
                        'id_foto_kost' => $foto->id_foto_kost,
                        'id_kost' => $foto->id_kost,
                        'foto_kost' => $foto->foto_kost, 
                    ];
                }),
            ];
            $kostsTerformat[] = $kostTerformat;
        }

        // Kembalikan data Kost yang diformat sebagai respons JSON
        return response()->json([
            'kosts' => $kostsTerformat,
        ], 200); // Kode status OK
    }
    public function filterKostKecamatan(Request $request)
    {
        // Validate kecamatan (district) input
        $validator = Validator::make($request->all(), [
            'kecamatan' => 'required|string|in:' . implode(',', [
                'Bagor', 'Baron', 'Berbek', 'Gondang', 'Jatikalen', 'Kertosono',
                'Lengkong', 'Loceret', 'Nganjuk', 'Ngetos', 'Ngluyu', 'Ngronggot',
                'Pace', 'Patianrowo', 'Plemahan', 'Prambon', 'Rejoso', 'Sawahan',
                'Sukomoro', 'Tanjunganom',
            ]), // Adjust kecamatan list if needed
        ]);

        if ($validator->fails()) {
            return response()->json([
                'pesan' => 'Kecamatan tidak valid.',
                'kesalahan' => $validator->errors(),
            ], 400); // Bad Request status code
        }

        // Filter Kosts by kecamatan
        $kosts = Kost::where('kecamatan', $request->kecamatan)->with('fotoKost')->get();

        // Check if any Kosts match the filter
        if ($kosts->isEmpty()) {
            return response()->json([
                'pesan' => 'Tidak ada Kost yang ditemukan di kecamatan yang dipilih.',
            ], 404); // Not Found status code
        }

        // Format and return filtered Kost data with photos
        $filteredKosts = [];
        foreach ($kosts as $kost) {
            $filteredKost = [
                'id_kost' => $kost->id_kost,
                'nama_kost' => $kost->nama_kost,
                'alamat' => $kost->alamat,
                'kecamatan' => $kost->kecamatan,
                'peraturan' => $kost->peraturan,
                'fasilitas' => $kost->fasilitas,
                'id_user' => $kost->id_user,
                'tipe' => $kost->tipe,
                'foto_kost' => $kost->fotoKost->map(function ($foto) {
                    return [
                        'id_foto_kost' => $foto->id_foto_kost,
                        'id_kost' => $foto->id_kost,
                        'foto_kost' => $foto->foto_kost, 
                    ];
                }),
            ];
            $filteredKosts[] = $filteredKost;
        }

        return response()->json([
            'kosts' => $filteredKosts,
        ], 200); // OK status code
    }
}
