<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\ResearchRequest;

class FacultyPublicController extends Controller
{
    public function index()
    {
        $faculties = Faculty::all();
        return view('faculty', compact('faculties'));
    }

    public function show($id)
    {
        $faculty = Faculty::findOrFail($id);
        return view('faculty_details', compact('faculty'));
    }

    public function submitResearchRequest(Request $request, $id)
    {
        $faculty = Faculty::findOrFail($id);

        $data = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_email' => 'required|email|max:255',
            'student_id' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $data['faculty_id'] = $faculty->id;
        $data['status'] = 'pending';

        ResearchRequest::create($data);

        return back()->with('success', 'Your research request has been submitted successfully. The teacher will review it and get back to you.');
    }
}
