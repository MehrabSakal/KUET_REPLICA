<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusSchedule;
use Illuminate\Http\Request;

class BusScheduleController extends Controller
{
    public function index()
    {
        $schedules = BusSchedule::orderBy('shift')->orderBy('departure_time')->get();
        return view('admin.bus-schedule.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.bus-schedule.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'shift' => 'required|in:morning,afternoon,night',
            'route' => 'required|string|max:255',
            'departure_time' => 'required|string|max:255',
            'bus_name' => 'required|string|max:255',
        ]);

        BusSchedule::create($request->all());

        return redirect()->route('admin.bus-schedule.index')->with('success', 'Bus schedule created successfully.');
    }

    public function edit(BusSchedule $busSchedule)
    {
        return view('admin.bus-schedule.edit', compact('busSchedule'));
    }

    public function update(Request $request, BusSchedule $busSchedule)
    {
        $request->validate([
            'shift' => 'required|in:morning,afternoon,night',
            'route' => 'required|string|max:255',
            'departure_time' => 'required|string|max:255',
            'bus_name' => 'required|string|max:255',
        ]);

        $busSchedule->update($request->all());

        return redirect()->route('admin.bus-schedule.index')->with('success', 'Bus schedule updated successfully.');
    }

    public function destroy(BusSchedule $busSchedule)
    {
        $busSchedule->delete();

        return redirect()->route('admin.bus-schedule.index')->with('success', 'Bus schedule deleted successfully.');
    }
}
