<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class TeacherProfileController extends Controller
{
    public function edit()
    {
        $teacher = Auth::guard('teacher')->user();
        return view('teacher.profile.edit', compact('teacher'));
    }

    public function update(Request $request)
    {
        $teacher = Auth::guard('teacher')->user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'research_interest' => 'nullable|string',
            'published_papers' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($teacher->image && file_exists(public_path('images/faculty/' . $teacher->image))) {
                unlink(public_path('images/faculty/' . $teacher->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/faculty'), $imageName);
            $validatedData['image'] = $imageName;
        } else {
            unset($validatedData['image']);
        }

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $teacher->update($validatedData);

        return redirect()->route('teacher.dashboard')->with('success', 'Profile updated successfully.');
    }
}
