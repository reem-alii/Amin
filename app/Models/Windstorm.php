<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Windstorm extends Model
{
    use HasFactory;
    protected $fillable = ['temperature', 'relative_humidity', 'pressure', 'wind_direction', 'precipitation', 'windgustspeed'];
}
