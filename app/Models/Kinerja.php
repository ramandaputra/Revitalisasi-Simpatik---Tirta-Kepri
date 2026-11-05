<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kinerja extends Model
{
    protected $table = 'kinerja';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'aspek_id',
        'periode',
        'indikator',
        'deskripsi1',
        'data1',
        'deskripsi2',
        'data2',
        'hasil',
        'score',
        'bobot',
    ];

    protected $casts = [
        'periode' => 'date',
        'data1' => 'decimal:2',
        'data2' => 'decimal:2',
    ];

    public function aspek(): BelongsTo
    {
        return $this->belongsTo(Aspek::class, 'aspek_id', 'aspek_id');
    }

    public function indikatorDetail(): BelongsTo
    {
        return $this->belongsTo(Indikator::class, 'indikator', 'indikator_id');
    }
}

