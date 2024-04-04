<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fotoKost extends Model
{
    use HasFactory;
    
    protected $table = "foto_kost";
    protected $primaryKey = "id_foto_kost";
    protected $fillable = ['foto_kost','created_at','updated_at'];

}
