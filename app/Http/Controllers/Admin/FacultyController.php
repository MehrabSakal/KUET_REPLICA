<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = \App\Models\Faculty::all();
        return view('admin.faculty.index', compact('faculties'));
    }

    public function create()
    {
        return view('admin.faculty.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'teacher_id' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'research_interest' => 'nullable|string',
            'published_papers' => 'nullable|string',
            'image' => 'nullable|url', // Simplifying to URL for easy input
        ]);

        \App\Models\Faculty::create($data);

        return redirect()->route('admin.faculty.index')->with('success', 'Faculty added successfully!');
    }

    public function edit(\App\Models\Faculty $faculty)
    {
        return view('admin.faculty.edit', compact('faculty'));
    }

    public function update(Request $request, \App\Models\Faculty $faculty)
    {
        $data = $request->validate([
            'teacher_id' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'research_interest' => 'nullable|string',
            'published_papers' => 'nullable|string',
            'image' => 'nullable|url',
        ]);

        $faculty->update($data);

        return redirect()->route('admin.faculty.index')->with('success', 'Faculty updated successfully!');
    }

    public function destroy(\App\Models\Faculty $faculty)
    {
        $faculty->delete();
        return redirect()->route('admin.faculty.index')->with('success', 'Faculty deleted successfully!');
    }
}
