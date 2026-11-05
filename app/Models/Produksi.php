<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table = 'produksi';
    public $timestamps = false;

    protected $fillable = [
        'ipa',
        'target',
        'produksi',
        'waktu',
        'waduk',
    ];

    protected $casts = [
        'waktu' => 'date',
    ];
}

