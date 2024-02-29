<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kamar; // Pastikan menyesuaikan dengan namespace model Kamar yang sebenarnya

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data yang ingin Anda masukkan ke dalam tabel kamar
        $data = [
            [
                'id_kost' => 1,
                'nama_kamar' => 'Kamar 1',
                'fasilitas_kamar' => 'AC, Kamar Mandi Dalam',
                'harga_bulanan' => 1500000,
                'harga_harian' => 100000,
            ],
            [
                'id_kost' => 1,
                'nama_kamar' => 'Kamar 2',
                'fasilitas_kamar' => 'AC, Kamar Mandi Luar',
                'harga_bulanan' => 1200000,
                'harga_harian' => 80000,
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Masukkan data ke dalam tabel kamar
        foreach ($data as $kamar) {
            Kamar::create($kamar);
        }
    }
}
