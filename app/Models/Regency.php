<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Regency extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'id',
        'province_id',
        'name',
        'slug'
    ];

    // Inverse
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    // Regency -> District (One to Many)
    public function districts()
    {
        return $this->hasMany(District::class);
    }

    // Regency -> Perusahaan (One to Many)
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
