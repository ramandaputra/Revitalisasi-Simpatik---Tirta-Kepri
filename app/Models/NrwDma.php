<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NrwDma extends Model
{
    protected $table = 'nrw_dma';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'dma',
        'periode',
        'lalu',
        'kini',
        'distribusi',
        'pelanggan',
        'pemakaian',
        'kehilangan',
        'persentase',
    ];

    protected $casts = [
        'periode' => 'date',
    ];
}

