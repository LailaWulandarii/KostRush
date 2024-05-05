<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Kamar;
use App\Models\foto_kost;

class Kost extends Model
{
    use HasFactory;
    protected $table = 'kosts';

    protected $fillable = [
        'nama_kost',
        'alamat',
        'peraturan',
        'fasilitas',
        'id_user',
        'tipe',
        'kecamatan',
    ];

    protected $hidden = [
        // ...
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // Sesuaikan 'id_user' dengan nama kolom yang benar
    }
    public function kamars()
    {
        return $this->hasMany(Kamar::class, 'id_kost');
    }
    public function fotoKost()
    {
        return $this->hasMany(foto_kost::class, 'id_kost');
    }
}
