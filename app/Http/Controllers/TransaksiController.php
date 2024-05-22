<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $transaksis = DB::table('transaksis')
            ->join('users', 'transaksis.id', '=', 'users.id')
            ->join('kamars', 'transaksis.id_kamar', '=', 'kamars.id')
            ->select(
                'transaksis.*',
                'users.name as nama_penyewa',
                'users.email',
                'users.no_hp',
                'users.jenis_kelamin',
                'users.alamat',
                'users.pekerjaan',
                'users.foto_ktp',
                'users.tgl_lahir',
                'transaksis.tanggal_masuk',
                'transaksis.tanggal_keluar',
                'transaksis.biaya',
                'kamars.nama_kamar'
            )
            ->where('transaksis.id_kost', $user->id_kost)
            ->where('transaksis.status_transaksi', 'menunggu')
            ->get();

        return view('pages.transaksiBaru', compact('transaksis'));
    }

    public function indexProses()
    {
        $user = Auth::user();
        $transaksis = DB::table('transaksis')
            ->join('users', 'transaksis.id', '=', 'users.id')
            ->join('kamars', 'transaksis.id_kamar', '=', 'kamars.id')
            ->select(
                'transaksis.*',
                'users.name as nama_penyewa',
                'users.email',
                'users.no_hp',
                'users.jenis_kelamin',
                'users.alamat',
                'users.pekerjaan',
                'users.foto_ktp',
                'users.tgl_lahir',
                'transaksis.tanggal_masuk',
                'transaksis.tanggal_keluar',
                'transaksis.biaya',
                'kamars.nama_kamar'
            )
            ->where('transaksis.id_kost', $user->id_kost)
            ->where('transaksis.status_transaksi', 'diproses')
            ->get();

        return view('pages.transaksiProses', compact('transaksis'));
    }

    public function prosesTransaksi($id_transaksi)
    {
        // Ambil status kamar
        $status_kamar = DB::table('transaksis')
            ->join('kamars', 'transaksis.id_kamar', '=', 'kamars.id')
            ->where('transaksis.id_transaksi', $id_transaksi)
            ->value('kamars.status_kamar');

        if ($status_kamar !== 'kosong') {
            return redirect()->back()->with('error', 'Status kamar tidak kosong. 
            Transaksi tidak dapat diproses.');
        }
        DB::table('transaksis')
            ->where('id_transaksi', $id_transaksi)
            ->update(['status_transaksi' => 'diproses']);

        $id_kamar = DB::table('transaksis')
            ->where('id_transaksi', $id_transaksi)
            ->value('id_kamar');
        DB::table('kamars')
            ->where('id', $id_kamar)
            ->update(['status_kamar' => 'dipesan']);

        return redirect()->back();
    }

    public function verifikasiTransaksi($id_transaksi)
    {
        $status_kamar = DB::table('transaksis')
            ->join('kamars', 'transaksis.id_kamar', '=', 'kamars.id')
            ->where('transaksis.id_transaksi', $id_transaksi)
            ->value('kamars.status_kamar');

        if ($status_kamar !== 'dipesan') {
            return redirect()->back()->with('error', 'Status kamar tidak dipesan. 
            Transaksi tidak dapat diverifikasi.');
        }
        DB::table('transaksis')
            ->where('id_transaksi', $id_transaksi)
            ->update(['status_transaksi' => 'selesai']);

        $transaksi = DB::table('transaksis')->where('id_transaksi', $id_transaksi)->first();
        $id_user = $transaksi->id;
        $id_kamar = $transaksi->id_kamar;

        DB::table('kamars')
            ->where('id', $id_kamar)
            ->update([
                'status_kamar' => 'terisi',
                'id_user' => $id_user,
                'jumlah_sewa' => DB::raw('jumlah_sewa + 1')
            ]);

        $id_kost = DB::table('kamars')
            ->join('kosts', 'kamars.id_kost', '=', 'kosts.id')
            ->where('kamars.id', $id_kamar)
            ->value('kosts.id');

        DB::table('users')
            ->where('id', $id_user)
            ->update([
                'id_kost' => $id_kost,
                'id_kamar' => $id_kamar
            ]);
        return redirect()->back();
    }


    public function riwayat()
    {
        $user = Auth::user();
        $transaksis = DB::table('transaksis')
            ->join('users', 'transaksis.id', '=', 'users.id')
            ->join('kamars', 'transaksis.id_kamar', '=', 'kamars.id')
            ->select(
                'transaksis.*',
                'users.name as nama_penyewa',
                'users.email',
                'users.no_hp',
                'users.jenis_kelamin',
                'users.alamat',
                'users.pekerjaan',
                'users.foto_ktp',
                'users.tgl_lahir',
                'transaksis.tanggal_masuk',
                'transaksis.tanggal_keluar',
                'transaksis.biaya',
                'kamars.nama_kamar'
            )
            ->where('transaksis.id_kost', $user->id_kost)
            ->whereIn('transaksis.status_transaksi', 'selesai')
            ->get();

        return view('pages.historyTransaksi', compact('transaksis'));
    }
}
