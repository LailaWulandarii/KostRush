<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kost; // Pastikan menyesuaikan dengan namespace model Kost yang sebenarnya

class KostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data yang ingin Anda masukkan ke dalam tabel kost
        $data = [
            [
                'nama_kost' => 'Kost Bapak Hakim',
                'alamat' => 'Jl. Suka Maju No. 10',
                'peraturan' => 'Dilarang membawa tamu menginap, tidak boleh bising setelah jam 10 malam, wajib menjaga kebersihan kost',
                'fasilitas' => 'Kamar mandi dalam, AC, WiFi, Parkiran',
            ],
            [
                'nama_kost' => 'Kost Melati',
                'alamat' => 'Jl. Bunga Raya No. 5',
                'peraturan' => 'Dilarang merokok di dalam kamar, wajib membuang sampah pada tempatnya, jam malam pukul 11 malam',
                'fasilitas' => 'Kamar mandi luar, WiFi, Parkiran',
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Masukkan data ke dalam tabel kost
        foreach ($data as $kost) {
            Kost::create($kost);
        }
    }
}
