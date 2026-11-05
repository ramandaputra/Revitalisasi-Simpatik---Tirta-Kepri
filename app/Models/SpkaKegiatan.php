<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpkaKegiatan extends Model
{
    protected $table = 'spka_kegiatan';
    protected $primaryKey = 'tiket';
    public $timestamps = false;

    protected $fillable = [
        'dma',
        'kategori',
        'tanggal_lapor',
        'kegiatan',
        'foto_kegiatan',
        'tanggal_selesai',
        'petugas',
        'penyelesaian',
        'status',
        'foto_penyelesaian',
    ];

    protected $casts = [
        'tanggal_lapor' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            '1' => 'Selesai',
            '2' => 'Dalam Proses',
            default => 'Belum Ditindaklanjuti',
        };
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            '1' => 'badge-success',
            '2' => 'badge-warning',
            default => 'badge-danger',
        };
    }
}

