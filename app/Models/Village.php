<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Village extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'id',
        'district_id',
        'name',
        'slug'
    ];

    // Inverse
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    // Village -> Perusahaan (One to Many)
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
