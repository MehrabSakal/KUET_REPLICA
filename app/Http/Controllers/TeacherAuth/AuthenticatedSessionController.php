<?php

namespace App\Http\Controllers\TeacherAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherAuth\TeacherLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('teacher.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(TeacherLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        return redirect()->route('teacher.dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('teacher')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/teacher/login');
    }
}
