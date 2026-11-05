<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GantiMeter extends Model
{
    protected $table = 'ganti_meter';
    public $timestamps = false;

    protected $fillable = [
        'target',
        'ganti_meter',
        'waktu',
        'wilayah',
    ];

    protected $casts = [
        'waktu' => 'date',
    ];
}

