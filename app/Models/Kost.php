<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;

    protected $table = 'kost'; // Nama tabel yang sesuai

    protected $primaryKey = 'id_kost'; // Kolom kunci primer

    protected $fillable = [
        'nama_kost',
        'fasilitas_kost',
        'peraturan_kost',
        'alamat',
        'jenis_bank',
        'no_rek',
        'nama_rek',
    ];

    public function kamars()
    {
        return $this->hasMany(Kamar::class, 'id_kost', 'id_kost');
    }
}
