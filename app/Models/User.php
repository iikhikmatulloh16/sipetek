<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nik',
        'name',
        'bio',
        'tempat_lahir',
        'tanggal_lahir',
        'status_perkawinan',
        'jenis_kelamin',
        'email',
        'phone',
        // Alamat
        // 
        // End Alamat
        'picture',
        'role',
        'password',
    ];

    protected $dates = ['tanggal_lahir'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('name', 'LIKE', '%' . $filters['search'] . '%')
                         ->orWhere('nik', 'LIKE', '%' . $filters['search'] . '%');
        }
    }

    public function getPictureAttribute($value)
    {
        if ($value) {
            return asset('users/images/'.$value);
        }else {
            return asset('users/images/no-image.png');
        }
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'user_id', 'id');
    }
}
