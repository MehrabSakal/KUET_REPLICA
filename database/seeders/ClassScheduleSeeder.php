<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Room;
use App\Models\ClassSchedule;
use Carbon\Carbon;

class ClassScheduleSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Departments
        $cse = Department::create(['name' => 'Computer Science and Engineering', 'code' => 'CSE']);
        $eee = Department::create(['name' => 'Electrical and Electronic Engineering', 'code' => 'EEE']);
        $me = Department::create(['name' => 'Mechanical Engineering', 'code' => 'ME']);

        // 2. Create Rooms
        $cse101 = Room::create(['department_id' => $cse->id, 'room_number' => 'CSE-101']);
        $cse102 = Room::create(['department_id' => $cse->id, 'room_number' => 'CSE-102']);
        $cse103 = Room::create(['department_id' => $cse->id, 'room_number' => 'CSE-103']); // Keep this empty
        
        $eee201 = Room::create(['department_id' => $eee->id, 'room_number' => 'EEE-201']);
        $me301 = Room::create(['department_id' => $me->id, 'room_number' => 'ME-301']);

        // 3. Create Schedules based on KUET time slots
        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];
        
        $currentDay = Carbon::now('Asia/Dhaka')->format('l');
        
        // CSE Year 1 - Sunday (Static Data)
        ClassSchedule::create([
            'department_id' => $cse->id,
            'room_id' => $cse101->id,
            'year' => 1,
            'day_of_week' => 'Sunday',
            'start_time' => '08:00:00',
            'end_time' => '08:50:00',
            'subject' => 'Structured Programming'
        ]);
        
        ClassSchedule::create([
            'department_id' => $cse->id,
            'room_id' => $cse101->id,
            'year' => 1,
            'day_of_week' => 'Sunday',
            'start_time' => '08:50:00',
            'end_time' => '09:40:00',
            'subject' => 'Discrete Mathematics'
        ]);
        
        ClassSchedule::create([
            'department_id' => $cse->id,
            'room_id' => $cse102->id,
            'year' => 1,
            'day_of_week' => 'Sunday',
            'start_time' => '10:40:00',
            'end_time' => '13:10:00',
            'subject' => 'Structured Programming Sessional'
        ]);

        // Dynamically add a class right NOW so we can test the live empty rooms logic
        $now = Carbon::now('Asia/Dhaka');
        $start = $now->copy()->subMinutes(30)->format('H:i:s');
        $end = $now->copy()->addMinutes(30)->format('H:i:s');
        
        if (!in_array($currentDay, ['Friday', 'Saturday'])) {
            ClassSchedule::create([
                'department_id' => $cse->id,
                'room_id' => $cse101->id,
                'year' => 2,
                'day_of_week' => $currentDay,
                'start_time' => $start,
                'end_time' => $end,
                'subject' => 'Data Structures (Live Test)'
            ]);
            
            ClassSchedule::create([
                'department_id' => $eee->id,
                'room_id' => $eee201->id,
                'year' => 1,
                'day_of_week' => $currentDay,
                'start_time' => $start,
                'end_time' => $end,
                'subject' => 'Electrical Circuits (Live Test)'
            ]);
        }
    }
}
