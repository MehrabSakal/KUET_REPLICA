<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Room;
use App\Models\ClassSchedule;
use App\Models\Faculty;
use Illuminate\Http\Request;

class ClassScheduleController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $rooms = Room::with('department')->get();
        $schedules = ClassSchedule::with(['department', 'room', 'faculty'])->orderBy('day_of_week')->orderBy('start_time')->get();
        $faculties = Faculty::all();
        
        return view('admin.class-schedule.index', compact('departments', 'rooms', 'schedules', 'faculties'));
    }

    public function create()
    {
        $departments = Department::all();
        $rooms = Room::with('department')->get();
        $faculties = Faculty::all();
        return view('admin.class-schedule.create', compact('departments', 'rooms', 'faculties'));
    }

    public function store(Request $request)
    {
        $type = $request->input('type', 'schedule');
        
        if ($type === 'department') {
            $request->validate(['name' => 'required', 'code' => 'required|unique:departments']);
            Department::create($request->only(['name', 'code']));
            return redirect()->back()->with('success', 'Department created!');
        } elseif ($type === 'room') {
            $request->validate(['department_id' => 'required', 'room_number' => 'required']);
            Room::create($request->only(['department_id', 'room_number']));
            return redirect()->back()->with('success', 'Room created!');
        } else {
            $request->validate([
                'department_id' => 'required',
                'room_id' => 'required',
                'faculty_id' => 'nullable|exists:faculties,id',
                'year' => 'required|integer|min:1|max:4',
                'day_of_week' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'subject' => 'required'
            ]);
            ClassSchedule::create($request->all());
            return redirect()->route('admin.class-schedule.index')->with('success', 'Schedule created!');
        }
    }

    public function edit($id)
    {
        return redirect()->route('admin.class-schedule.index');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.class-schedule.index');
    }

    public function destroy($id, Request $request)
    {
        $type = $request->query('type', 'schedule');
        
        if ($type === 'department') {
            Department::findOrFail($id)->delete();
        } elseif ($type === 'room') {
            Room::findOrFail($id)->delete();
        } else {
            ClassSchedule::findOrFail($id)->delete();
        }
        
        return redirect()->back()->with('success', 'Deleted successfully!');
    }
}
