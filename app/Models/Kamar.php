<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar'; // Nama tabel yang sesuai

    protected $primaryKey = 'id_kamar'; // Kolom kunci primer

    protected $fillable = [
        'id_kost',
        'nama_kamar',
        'fasilitas_kamar',
        'harga_bulanan',
        'harga_harian',
    ];

    // Relasi dengan model Kost
    public function kost()
    {
        return $this->belongsTo(Kost::class, 'id_kost', 'id_kost');
    }
    public function fotoKamar(){
        return $this->hasMany(fotoKamar::class, 'id_kamar', 'id_kamar');
    }
    
}
