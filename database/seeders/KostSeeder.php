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
                'nama_kost' => 'Kost A',
                'fasilitas_kost' => 'Wi-Fi, Parkir Luas, Keamanan 24 Jam',
                'peraturan_kost' => 'Tidak boleh membawa hewan peliharaan, Tidak merokok di dalam kamar',
                'alamat' => 'Jalan Contoh No. 123',
                'jenis_bank' => 'BCA',
                'no_rek' => '1234567890',
                'nama_rek' => 'Pemilik Kost A',
            ],
            [
                'nama_kost' => 'Kost B',
                'fasilitas_kost' => 'Dapur Bersama, Akses ke Transportasi Umum',
                'peraturan_kost' => 'Tidak boleh membawa tamu lebih dari 2 orang, Membersihkan kamar secara berkala',
                'alamat' => 'Jalan Contoh No. 456',
                'jenis_bank' => 'BNI',
                'no_rek' => '0987654321',
                'nama_rek' => 'Pemilik Kost B',
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Masukkan data ke dalam tabel kost
        foreach ($data as $kost) {
            Kost::create($kost);
        }
    }
}
