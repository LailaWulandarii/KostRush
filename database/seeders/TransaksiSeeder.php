<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d');

        $transaksi = [
            [
                'id_kost' => 1, // Reference an existing kost ID
                'id_kamar' => 1, // Reference an existing kamar ID
                'id' => 5, // Reference an existing user ID (penyewa)
                'biaya' => 500000,
                'tanggal_masuk' => $now,
                'tanggal_keluar' => date('Y-m-d', strtotime($now . ' + 1 month')),
                'status' => 'selesai',
            ],
            [
                'id_kost' => 1, // Reference another existing kost ID
                'id_kamar' => 2, // Reference another existing kamar ID
                'id' => 6, // Reference another existing user ID (penyewa)
                'biaya' => 600000,
                'tanggal_masuk' => date('Y-m-d', strtotime($now . ' - 1 week')),
                'tanggal_keluar' => $now,
                'status' => 'menunggu',
            ],
        ];

        DB::table('transaksis')->insert($transaksi);
    }
}
