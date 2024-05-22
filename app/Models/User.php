<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Kost;
use App\Models\Transaksi;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'alamat',
        'pekerjaan',
        'tgl_lahir',
        'no_hp',
        'jenis_kelamin',
        'foto_ktp',
        'id_kost',
        'id_kamar',
        'verification_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function penghuniKamar()
    {
        return $this->hasOne(Kamar::class, 'id_user'); 
    }
    public function kamar()
    {
        return $this->hasMany(Kamar::class, 'id_user');
    }
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id');
    }
    public function kost()
    {
        return $this->belongsTo(Kost::class, 'id_kost');
    }




    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    // Definisi relasi User ke Transaksi (satu user bisa memiliki banyak transaksi)

}
