<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Perusahaan;
use App\Models\Perihal;
use Cviebrock\EloquentSluggable\Sluggable;

class Pengaduan extends Model
{
    use HasFactory;
    use Sluggable;

    // Yang Harus di Isi
    // protected $fillable = [
    //     'title',
    //     'excerpt',
    //     'body'
    // ];
    
    // Yang Boleh Tidak di Isi
    protected $guarded = ['id'];

    protected $hidden = [
    ];

    // public function scopeSearch($query, $subjek)
    // {
    //     return $query->where('subjek', 'LIKE',"%{$subjek}%");
    // }

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('subjek', 'LIKE', '%' . $filters['search'] . '%')
                         ->orWhere('status', 'LIKE', '%' . $filters['search'] . '%');
        }
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function perihal()
    {
        return $this->belongsTo(Perihal::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class, 'pengaduan_id', 'id');
    }

    // public function tanggapans() {
    //     return $this->belongsTo(Pengaduan::class, 'id', 'id');
    // }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // menggambil slug dari subjek
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'subjek'
            ]
        ];
    }
}
