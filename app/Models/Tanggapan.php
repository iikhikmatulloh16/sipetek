<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    // protected $hidden = [

    // ];

    public function pengaduans()
    {
        return $this->hasOne(Pengaduan::class, 'id', 'id');
    }

    public function author()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
