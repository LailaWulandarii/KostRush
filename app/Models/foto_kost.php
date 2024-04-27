<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto_kost extends Model
{
    use HasFactory;
    protected $table = 'foto_kost';

    protected $fillable = [
        'id_kost',
        'foto_kost',
    ];

    protected $hidden = [
        // ...
    ];

    public function kost()
    {
        return $this->belongsTo(Kost::class, 'id_kost');
    }
}
