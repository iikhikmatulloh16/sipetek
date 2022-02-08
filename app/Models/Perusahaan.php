<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Perusahaan extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [
        'id'
    ];

    protected $dates = ['tanggal_berdiri'];

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('name', 'LIKE', '%' . $filters['search'] . '%');
        }
    }

    // Inverse
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    // Inverse
    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }
    // Inverse
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    // Inverse
    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class);
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
