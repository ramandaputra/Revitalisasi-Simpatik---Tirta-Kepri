<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aspek extends Model
{
    protected $table = 'aspek';
    protected $primaryKey = 'aspek_id';
    public $timestamps = false;

    protected $fillable = [
        'aspek_kinerja',
    ];

    public function indikators(): HasMany
    {
        return $this->hasMany(Indikator::class, 'aspek_id', 'aspek_id');
    }

    public function kinerjas(): HasMany
    {
        return $this->hasMany(Kinerja::class, 'aspek_id', 'aspek_id');
    }
}

