<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $teacher = Auth::guard('teacher')->user();
        
        $pendingRequests = $teacher->researchRequests()->where('status', 'pending')->latest()->get();
        $pastRequests = $teacher->researchRequests()->where('status', '!=', 'pending')->latest()->get();

        return view('teacher.dashboard', compact('teacher', 'pendingRequests', 'pastRequests'));
    }

    public function approveRequest($id)
    {
        $teacher = Auth::guard('teacher')->user();
        $request = clone $teacher->researchRequests()->findOrFail($id);
        
        $request->update(['status' => 'approved']);
        
        return back()->with('success', 'Research request approved.');
    }

    public function rejectRequest($id)
    {
        $teacher = Auth::guard('teacher')->user();
        $request = clone $teacher->researchRequests()->findOrFail($id);
        
        $request->update(['status' => 'rejected']);
        
        return back()->with('success', 'Research request rejected.');
    }
}
