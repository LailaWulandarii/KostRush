<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamars = Kamar::with('kost')->get(); // Sesuaikan hubungan model jika diperlukan

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
                // 'foto_kamar' => $kamar->fotoKamar->map(function ($foto) {
                //     return [
                //         'id_foto_kamar' => $foto->id_foto_kamar,
                //         'id_kamar' => $foto->id_kamar,
                //         'foto_kamar' => $foto->foto_kamar,
                //     ];
                // }),
                'foto_kamar' => $kamar->foto_kamar,
            ];
            $kamarsTerformat[] = $kamarTerformat;
        }

        // Kembalikan data Kamar yang diformat sebagai respons JSON
        return response()->json([
            'status' => 200,
            'kamars' => $kamarsTerformat,
        ], 200); // Kode status OK
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kamars = Kamar::with('kost')->get()->where('id', '=', $id); // Sesuaikan hubungan model jika diperlukan

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
                // 'foto_kamar' => $kamar->fotoKamar->map(function ($foto) {
                //     return [
                //         'id_foto_kamar' => $foto->id_foto_kamar,
                //         'id_kamar' => $foto->id_kamar,
                //         'foto_kamar' => $foto->foto_kamar,
                //     ];
                // }),
                'foto_kamar' => $kamar->foto_kamar,
            ];
            $kamarsTerformat[] = $kamarTerformat;
        }

        // Kembalikan data Kamar yang diformat sebagai respons JSON
        return response()->json([
            'status' => 200,
            'kamars' => $kamarsTerformat,
        ], 200); // Kode status OK
    }

    public function filterKamarKecamatan(Request $request)
    {
        // Validate kecamatan (district) input
        $validator = Validator::make($request->all(), [
            'kecamatan' => 'required|string|in:' . implode(',', [
                'Bagor',
                'Baron',
                'Berbek',
                'Gondang',
                'Jatikalen',
                'Kertosono',
                'Lengkong',
                'Loceret',
                'Nganjuk',
                'Ngetos',
                'Ngluyu',
                'Ngronggot',
                'Pace',
                'Patianrowo',
                'Plemahan',
                'Prambon',
                'Rejoso',
                'Sawahan',
                'Sukomoro',
                'Tanjunganom',
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
        $kamars = Kamar::with('kost');

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
                'id_kamar' => $kamar->id,
                'nama_kamar' => $kamar->nama_kamar,
                'harga' => $kamar->harga,
                'fasilitas' => $kamar->fasilitas,
                'status_kamar' => $kamar->status_kamar,
                'id_kost' => $kamar->id_kost,
                'jumlah_sewa' => $kamar->jumlah_sewa,
                'kecamatan' => $kamar->kost->kecamatan, // Akses kecamatan dari relasi Kost
                // 'foto_kamar' => $kamar->fotoKamar->map(function ($foto) {
                //     return [
                //         'id_foto_kamar' => $foto->id_foto_kamar,
                //         'id_kamar' => $foto->id_kamar,
                //         'foto_kamar' => $foto->foto_kamar,
                //     ];
                // }),
                'foto_kamar' => $kamar->foto_kamar,
            ];
        });

        // Kembalikan data Kamar yang diformat sebagai respons JSON
        return response()->json([
            'kamars' => $kamarsTerformat,
        ], 200); // Kode status OK
    }

    public function kamarTermurah()
    {
        $kamar = Kamar::orderBy('harga', 'asc')->get();
        return response()->json([
            'data' => $kamar,
        ], 200);
    }

    public function kamarTerpopuler()
    {
        $kamar = Kamar::orderBy('jumlah_sewa', 'desc')->get();
        return response()->json([
            'data' => $kamar,
        ], 200);
    }

    public function kamarKosong()
    {
        $kamar = Kamar::get()->where('status_kamar', '=', 'kosong');
        return response()->json([
            'data' => $kamar,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
