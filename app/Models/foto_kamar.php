<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto_kamar extends Model
{
    use HasFactory;
    protected $table = 'foto_kamar';

    protected $fillable = [
        'id_kamar',
        'foto_kamar',
    ];

    protected $hidden = [
        // ...
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar');
    }
}
