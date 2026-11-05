<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusKelistrikan extends Model
{
    protected $table = 'status_kelistrikan';
    public $timestamps = false;

    protected $fillable = [
        'status',
        'waktu',
        'waduk',
    ];

    protected $casts = [
        'waktu' => 'datetime',
    ];
}

