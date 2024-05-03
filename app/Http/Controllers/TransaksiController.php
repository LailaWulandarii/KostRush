<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Impor model User
use App\Models\Kamar; // Impor model User
use App\Models\Transaksi; // Impor model Transaksi
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

        // Lakukan validasi
        if ($status_kamar !== 'kosong') {
            return redirect()->back()->with('error', 'Status kamar tidak kosong. Transaksi tidak dapat diproses.');
        }
        // Update status transaksi menjadi "diproses"
        DB::table('transaksis')
            ->where('id_transaksi', $id_transaksi)
            ->update(['status_transaksi' => 'diproses']);

        // Update status kamar menjadi "dipesan"
        $id_kamar = DB::table('transaksis')
            ->where('id_transaksi', $id_transaksi)
            ->value('id_kamar');
        DB::table('kamars')
            ->where('id', $id_kamar)
            ->update(['status_kamar' => 'dipesan']);

        // Redirect atau kembali ke halaman yang sesuai
        return redirect()->back();
    }

    // Metode untuk memverifikasi transaksi
    public function verifikasiTransaksi($id_transaksi)
    {
        // Ambil status kamar
        $status_kamar = DB::table('transaksis')
            ->join('kamars', 'transaksis.id_kamar', '=', 'kamars.id')
            ->where('transaksis.id_transaksi', $id_transaksi)
            ->value('kamars.status_kamar');

        // Lakukan validasi
        if ($status_kamar !== 'dipesan') {
            return redirect()->back()->with('error', 'Status kamar tidak dipesan. Transaksi tidak dapat diverifikasi.');
        }
        // Update status transaksi menjadi "selesai"
        DB::table('transaksis')
            ->where('id_transaksi', $id_transaksi)
            ->update(['status_transaksi' => 'selesai']);

        // Ambil ID user dan ID kamar dari data transaksi
        $transaksi = DB::table('transaksis')->where('id_transaksi', $id_transaksi)->first();
        $id_user = $transaksi->id;
        $id_kamar = $transaksi->id_kamar;

        // Update status kamar menjadi "terisi" dan id_user
        DB::table('kamars')
            ->where('id', $id_kamar)
            ->update([
                'status_kamar' => 'terisi',
                'id_user' => $id_user,
                'jumlah_sewa' => DB::raw('jumlah_sewa + 1')
            ]);

        // Ambil id_kost dari tabel kosts
        $id_kost = DB::table('kamars')
            ->join('kosts', 'kamars.id_kost', '=', 'kosts.id')
            ->where('kamars.id', $id_kamar)
            ->value('kosts.id');

        // Update id_kost dan id_kamar di tabel users
        DB::table('users')
            ->where('id', $id_user)
            ->update([
                'id_kost' => $id_kost,
                'id_kamar' => $id_kamar
            ]);

        // Redirect atau kembali ke halaman yang sesuai
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
            ->whereIn('transaksis.status_transaksi', ['selesai', 'diproses'])
            ->get();

        return view('pages.historyTransaksi', compact('transaksis'));
    }
}
