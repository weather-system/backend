<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherData extends Model
{
    protected $fillable = [
        'kecepatan_angin',
        'arah_angin',
        'curah_hujan',
        'suhu',
        'kelembapan',
        'intensitas_cahaya',
    ];
}
