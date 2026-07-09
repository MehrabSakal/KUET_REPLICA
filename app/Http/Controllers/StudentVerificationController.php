<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentVerificationController extends Controller
{
    public function showVerifyForm()
    {
        return view('student.verify');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'student_id' => 'required|string',
        ]);

        $student = Student::where('student_id', $request->student_id)->first();

        if ($student) {
            $request->session()->put('student_id', $student->student_id);
            
            // Redirect back to intended page (e.g. teacher profile), or home
            return redirect()->intended('/')->with('success', 'Student ID verified successfully.');
        }

        return back()->withErrors([
            'student_id' => 'The provided Student ID does not exist in our records.',
        ])->withInput();
    }
}
