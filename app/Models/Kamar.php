<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kost;
use App\Models\User;

class Kamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kamar',
        'harga',
        'fasilitas',
        'status_kamar',
        'id_kost',
        'id_user',
        'jumlah_sewa', // Sesuaikan dengan nama kunci asing yang sesuai
    ];

    public function kost()
    {
        return $this->belongsTo(Kost::class, 'id_kost');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // Sesuaikan dengan nama kunci asing yang sesuai
    }
    public function tampilkanKamarTertinggi()
    {
        $kamarTertinggi = Kamar::orderBy('jumlah_sewa', 'desc')->first();
        // Kemudian tampilkan kamar dengan jumlah sewa tertinggi
    }
}
