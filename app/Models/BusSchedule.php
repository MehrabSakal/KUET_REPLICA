<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'shift',
        'route',
        'departure_time',
        'bus_name',
    ];
}
