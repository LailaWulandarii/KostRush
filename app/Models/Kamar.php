<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kost;
use App\Models\User;
use App\Models\Transaksi;

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
        'jumlah_sewa',
        'foto_kamar',
    ];
    public function kost()
    {
        return $this->belongsTo(Kost::class, 'id_kost');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); 
    }
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_kamar');
    }
}
