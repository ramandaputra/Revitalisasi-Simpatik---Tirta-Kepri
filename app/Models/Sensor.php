<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    /**
     * Database connection explicitly pointing to kepri_iot
     */
    protected $connection = 'kepri_iot';

    protected $table = 'sensor';

    public $timestamps = false;

    protected $fillable = [
        'time',
        'pressure',
        'flow',
        'tds',
        'water_level',
        'lat',
        'lng',
        'name',
    ];

    protected $casts = [
        'time' => 'datetime',
        'pressure' => 'float',
        'flow' => 'float',
        'tds' => 'float',
        'water_level' => 'float',
    ];

    /**
     * Clean display name without sensor_ prefix
     */
    public function getCleanNameAttribute(): string
    {
        return strtoupper(str_replace('sensor_', '', $this->name));
    }
}
