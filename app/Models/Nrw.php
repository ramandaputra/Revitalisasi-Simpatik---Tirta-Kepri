<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nrw extends Model
{
    protected $table = 'nrw';
    public $timestamps = false;

    protected $fillable = [
        'waktu',
        'jdu',
        'target',
        'pelanggan',
        'penjualan',
        'kehilangan',
        'persentase',
        'waduk',
        'wilayah',
    ];

    protected $casts = [
        'waktu' => 'date',
        'persentase' => 'decimal:2',
    ];
}

