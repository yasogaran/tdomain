<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to access the admin panel.');
        }

        // Check if user has admin or editor role
        if (!in_array(auth()->user()->role, ['admin', 'editor'])) {
            abort(403, 'Unauthorized access. You do not have permission to access the admin panel.');
        }

        return $next($request);
    }
}
