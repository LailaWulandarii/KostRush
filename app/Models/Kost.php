<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Kamar;

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
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); 
    }
    public function kamars()
    {
        return $this->hasMany(Kamar::class, 'id_kost');
    }
}
