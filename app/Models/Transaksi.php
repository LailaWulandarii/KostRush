<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "transaksi";
    protected $primaryKey = "id_transaksi";
    protected $fillable = ['metode_bayar','tanggal_masuk','status','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');    }

}
