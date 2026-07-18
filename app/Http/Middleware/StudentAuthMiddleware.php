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
            // Store the intended URL. If it's a GET request, store the requested URL. 
            // If it's a POST (like submitting a form), store the previous URL so we go back to the form page.
            $intendedUrl = $request->isMethod('GET') ? $request->fullUrl() : url()->previous();
            $request->session()->put('url.intended', $intendedUrl);
            
            return redirect()->route('student.verify')->with('error', 'Please verify your Student ID to access this feature.');
        }

        return $next($request);
    }
}
