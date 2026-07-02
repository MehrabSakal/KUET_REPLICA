<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'email' => 'required|email|unique:faculties,email',
            'password' => 'required|string|min:8',
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'research_interest' => 'nullable|string',
            'published_papers' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('faculty_images', 'public');
            $data['image'] = '/storage/' . $path;
        }

        $data['password'] = \Illuminate\Support\Facades\Hash::make($data['password']);

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
            'email' => 'required|email|unique:faculties,email,' . $faculty->id,
            'password' => 'nullable|string|min:8',
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'research_interest' => 'nullable|string',
            'published_papers' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($faculty->image) {
                $oldPath = str_replace('/storage/', '', $faculty->image);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image')->store('faculty_images', 'public');
            $data['image'] = '/storage/' . $path;
        }

        if (!empty($data['password'])) {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $faculty->update($data);

        return redirect()->route('admin.faculty.index')->with('success', 'Faculty updated successfully!');
    }

    public function destroy(\App\Models\Faculty $faculty)
    {
        if ($faculty->image) {
            $oldPath = str_replace('/storage/', '', $faculty->image);
            Storage::disk('public')->delete($oldPath);
        }
        $faculty->delete();
        return redirect()->route('admin.faculty.index')->with('success', 'Faculty deleted successfully!');
    }
}
