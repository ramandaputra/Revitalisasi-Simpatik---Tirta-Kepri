<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dma extends Model
{
    protected $table = 'dma';
    public $timestamps = false;

    protected $fillable = [
        'nama_dma',
    ];
}

