<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Laila Wulandari',
                'email' => 'lailawulandari@gmail.com',
                'password' => Hash::make('laila123'),
                'role' => 'penyewa',
                'alamat' => 'Jl. Jalanan No. 2',
                'pekerjaan' => 'Student',
                'tgl_lahir' => '1995-01-01',
                'no_hp' => '08987654321',
                'jenis_kelamin' => 'perempuan',
                'foto_ktp' => 'path/to/foto_ktp.jpg',
            ]
        ]);
    }
}
