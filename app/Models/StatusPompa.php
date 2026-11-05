<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPompa extends Model
{
    protected $table = 'status_pompa';
    public $timestamps = false;

    protected $fillable = [
        'pompa',
        'status',
        'waktu',
        'waduk',
    ];

    protected $casts = [
        'waktu' => 'datetime',
    ];
}

