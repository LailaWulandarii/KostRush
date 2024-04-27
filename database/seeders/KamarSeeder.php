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
                'nama_kamar' => 'Kamar A',
                'harga' => 500000,
                'fasilitas' => 'AC, WiFi',
                'status_kamar' => 'kosong',
            ],
            [
                'nama_kamar' => 'Kamar C',
                'harga' => 600000,
                'fasilitas' => 'AC, TV, WiFi',
                'status_kamar' => 'terisi',
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Masukkan data ke dalam tabel kamar
        foreach ($data as $kamar) {
            Kamar::create($kamar);
        }
    }
}
