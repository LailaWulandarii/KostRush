<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kost;
use App\Models\Kamar;
use App\Models\User;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $fillable = [
        'id_kost',
        'id_kamar',
        'id',
        'biaya',
        'tanggal_masuk',
        'tanggal_keluar',
        'status_transaksi',
    ];
    public function kost()
    {
        return $this->belongsTo(Kost::class, 'id_kost');
    }
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
