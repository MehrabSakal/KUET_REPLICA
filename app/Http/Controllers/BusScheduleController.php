<?php

namespace App\Http\Controllers;

use App\Models\BusSchedule;
use Illuminate\Http\Request;

class BusScheduleController extends Controller
{
    public function index()
    {
        $schedules = BusSchedule::orderBy('departure_time')->get()->groupBy('shift');
        return view('bus-schedule.index', compact('schedules'));
    }
}
