<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Indikator extends Model
{
    protected $table = 'indikator';
    protected $primaryKey = 'indikator_id';
    public $timestamps = false;

    protected $fillable = [
        'aspek_id',
        'indikator',
    ];

    public function aspek(): BelongsTo
    {
        return $this->belongsTo(Aspek::class, 'aspek_id', 'aspek_id');
    }

    public function kinerjas(): HasMany
    {
        return $this->hasMany(Kinerja::class, 'indikator', 'indikator_id');
    }
}

