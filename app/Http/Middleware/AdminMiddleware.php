<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $is_admin): Response
    {
        // Check if the user is authenticated and has the admin role
        if (Auth::check()) {
            if (auth::user()->typeUser== $is_admin) {
                return $next($request);
            }
            abort(401);
        }
    }
}
