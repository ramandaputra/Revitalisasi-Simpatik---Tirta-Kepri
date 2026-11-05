<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    public $timestamps = false;

    protected $fillable = [
        'nosamb',
        'norekening',
        'nama',
        'alamat',
        'rt',
        'norab',
        'tgldaftar',
        'tglputus',
        'kategori_putus',
        'keterangan_putus',
        'waktuupdate',
        'latitude',
        'longitude',
        'rw',
        'nohp',
        'notelp',
        'email',
        'nosamb_utara',
        'nosamb_timur',
        'nosamb_barat',
        'nosamb_selatan',
        'koderayon',
        'kodekelurahan',
        'kodezona',
        'kodedma',
        'kodebanjar',
    ];

    protected $casts = [
        'tgldaftar' => 'date',
        'tglputus' => 'datetime',
        'waktuupdate' => 'datetime',
    ];
}

