<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Room;
use App\Models\ClassSchedule;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ClassScheduleController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('class-schedule.departments', compact('departments'));
    }

    public function department(Department $department)
    {
        return view('class-schedule.department-options', compact('department'));
    }

    public function yearSchedule(Department $department, $year)
    {
        $schedules = ClassSchedule::with('room')
            ->where('department_id', $department->id)
            ->where('year', $year)
            ->orderBy('start_time')
            ->get()
            ->groupBy('day_of_week');
            
        return view('class-schedule.year-schedule', compact('department', 'year', 'schedules'));
    }

    public function emptyRooms(Department $department)
    {
        $now = Carbon::now('Asia/Dhaka');
        $currentDay = $now->format('l'); // e.g. "Monday"
        $currentTime = $now->format('H:i:s');

        // Find all rooms in this department
        $allRooms = Room::where('department_id', $department->id)->pluck('id', 'room_number');
        
        // Find schedules that are happening right now
        $ongoingClasses = ClassSchedule::where('department_id', $department->id)
            ->where('day_of_week', $currentDay)
            ->where('start_time', '<=', $currentTime)
            ->where('end_time', '>=', $currentTime)
            ->pluck('room_id')
            ->toArray();
            
        $emptyRooms = [];
        foreach ($allRooms as $roomNumber => $roomId) {
            if (!in_array($roomId, $ongoingClasses)) {
                $emptyRooms[] = $roomNumber;
            }
        }
        
        return view('class-schedule.empty-rooms', compact('department', 'emptyRooms', 'currentDay', 'currentTime'));
    }
}
