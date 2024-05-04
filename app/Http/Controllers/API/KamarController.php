<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kost;
use App\Models\Kamar;
use Illuminate\Support\Facades\Validator;


class KamarController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua Kamar dengan eager loading untuk FotoKamar dan Kost
        $kamars = Kamar::with(['fotoKamar', 'kost'])->get(); // Sesuaikan hubungan model jika diperlukan

        // Periksa apakah ada Kamar
        if ($kamars->isEmpty()) {
            return response()->json([
                'pesan' => 'Tidak ada Kamar yang ditemukan.',
            ], 404); // Kode status Tidak Ditemukan
        }

        // Format dan kembalikan data Kamar dengan FotoKamar, kecamatan, dan ID Kost terkait
        $kamarsTerformat = [];
        foreach ($kamars as $kamar) {
            $kamarTerformat = [
                'id_kamar' => $kamar->id,
                'nama_kamar' => $kamar->nama_kamar,
                'harga' => $kamar->harga,
                'fasilitas' => $kamar->fasilitas,
                'status_kamar' => $kamar->status_kamar,
                // 'id_kost' => $kamar->id_kost,
                'jumlah_sewa' => $kamar->jumlah_sewa,
                'kecamatan' => $kamar->kost->kecamatan, // Akses kecamatan dari relasi Kost
                'id_kost' => $kamar->kost->id, // Akses ID Kost dari relasi Kost
                'foto_kamar' => $kamar->fotoKamar->map(function ($foto) {
                    return [
                        'id_foto_kamar' => $foto->id_foto_kamar,
                        'id_kamar' => $foto->id_kamar,
                        'foto_kamar' => $foto->foto_kamar,
                    ];
                }),
            ];
            $kamarsTerformat[] = $kamarTerformat;
        }

        // Kembalikan data Kamar yang diformat sebagai respons JSON
        return response()->json([
            'kamars' => $kamarsTerformat,
        ], 200); // Kode status OK
    }
    public function filterKamarKecamatan(Request $request)
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

        // Ambil nilai kecamatan dari permintaan
        $kecamatan = $request->input('kecamatan');

        // Ambil Kamar dengan eager loading untuk FotoKamar dan Kost
        $kamars = Kamar::with(['fotoKamar', 'kost']);

        // Terapkan filter kecamatan jika parameter disediakan
        if ($kecamatan) {
            $kamars->whereHas('kost', function ($query) use ($kecamatan) {
                $query->where('kecamatan', $kecamatan);
            });
        }

        // Ambil data Kamar yang difilter
        $filteredKamars = $kamars->get();

        // Periksa apakah ada Kamar yang memenuhi filter
        if ($filteredKamars->isEmpty()) {
            return response()->json([
                'pesan' => 'Tidak ada Kamar yang ditemukan di kecamatan yang dipilih.',
            ], 404); // Kode status Tidak Ditemukan
        }

        // Format dan kembalikan data Kamar yang difilter dengan FotoKamar, kecamatan, dan ID Kost terkait
        $kamarsTerformat = $filteredKamars->map(function ($kamar) {
            return [
                'id_kamar' => $kamar->id_kamar,
                'nama_kamar' => $kamar->nama_kamar,
                'harga' => $kamar->harga,
                'fasilitas' => $kamar->fasilitas,
                'status_kamar' => $kamar->status_kamar,
                'id_kost' => $kamar->id_kost,
                'jumlah_sewa' => $kamar->jumlah_sewa,
                'kecamatan' => $kamar->kost->kecamatan, // Akses kecamatan dari relasi Kost
                'foto_kamar' => $kamar->fotoKamar->map(function ($foto) {
                    return [
                        'id_foto_kamar' => $foto->id_foto_kamar,
                        'id_kamar' => $foto->id_kamar,
                        'foto_kamar' => $foto->foto_kamar,
                    ];
                }),
            ];
        });

        // Kembalikan data Kamar yang diformat sebagai respons JSON
        return response()->json([
            'kamars' => $kamarsTerformat,
        ], 200); // Kode status OK
    }
}
