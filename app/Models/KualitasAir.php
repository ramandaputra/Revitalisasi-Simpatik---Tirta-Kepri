<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KualitasAir extends Model
{
    protected $table = 'kualitas_air';
    public $timestamps = false;

    protected $fillable = [
        'waktu',
        'lokasi',
        'warna',
        'kekeruhan',
        'tds',
        'ph',
        'scl',
        'waduk',
    ];

    protected $casts = [
        'waktu' => 'datetime',
    ];
}

