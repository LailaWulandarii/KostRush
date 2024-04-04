<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fotoKamar extends Model
{
    use HasFactory;
    
    protected $table = "foto_kamar";
    protected $primaryKey = "id_foto_kamar";
    protected $fillable = ['foto_kamar','created_at','updated_at'];
    public function kamar(){
        return $this->belongsTo(Kamar::class, 'id_kamar', 'id_kamar');
    }
}
