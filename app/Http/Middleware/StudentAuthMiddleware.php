<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('student_id')) {
            // Store the page the student was on (not the POST URL) so we can redirect back after verification
            $request->session()->put('url.intended', url()->previous());
            return redirect()->route('student.verify')->with('error', 'Please verify your Student ID to access this feature.');
        }

        return $next($request);
    }
}
