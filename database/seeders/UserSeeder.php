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
                'name' => 'Lutfi Hakim',
                'email' => 'lutfihakim@gmail.com',
                'password' => bcrypt('hakim123'),
                'role' => 'pemilik',
                'alamat' => 'Jl. Jalanan No. 1',
                'pekerjaan' => 'Software Engineer',
                'tgl_lahir' => '1990-01-01',
                'no_hp' => '08123456789',
                'jenis_kelamin' => 'laki-laki',
                'foto_ktp' => 'path/to/foto_ktp.jpg',
            ],
            [
                'name' => 'Laila Wulandari',
                'email' => 'lailawulandari08@gmail.com',
                'password' => bcrypt('laila123'),
                'role' => 'penyewa',
                'alamat' => 'Jl. Jalanan No. 2',
                'pekerjaan' => 'Student',
                'tgl_lahir' => '1995-01-01',
                'no_hp' => '08987654321',
                'jenis_kelamin' => 'perempuan',
                'foto_ktp' => 'path/to/foto_ktp.jpg',
            ],
            [
                'name' => 'Nazira Ayu',
                'email' => 'naziraayu@gmail.com',
                'password' => bcrypt('jeje123'),
                'role' => 'penyewa',
                'alamat' => 'Jl. Jalanan No. 3',
                'pekerjaan' => 'Entrepreneur',
                'tgl_lahir' => '1985-01-01',
                'no_hp' => '08123456789',
                'jenis_kelamin' => 'perempuan',
                'foto_ktp' => 'path/to/foto_ktp.jpg',
            ],
        ]);
    }
}
