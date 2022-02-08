<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class District extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'id',
        'regency_id',
        'name',
        'slug'
    ];

    // Inverse
    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    // District -> Village (One to Many)
    public function villages()
    {
        return $this->hasMany(Village::class);
    }

    // District -> Perusahaan (One to Many)
    public function perusahaans()
    {
        return $this->hasOne(Perusahaan::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // menggambil slug dari name
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
