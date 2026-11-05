<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tma extends Model
{
    protected $table = 'tma';
    public $timestamps = false;

    protected $fillable = [
        'waktu',
        'tma',
        'waduk',
    ];

    protected $casts = [
        'waktu' => 'datetime',
        'tma' => 'float',
    ];
}

