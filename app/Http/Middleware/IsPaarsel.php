<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsPaarsel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            abort(404);
        }

        if (
            Auth::user()->level == 1
            or Auth::user()->level == 2
            or Auth::user()->level == 3
            or Auth::user()->level == 4
            or Auth::user()->level == 10
        ) {
        } else {
            abort(404);
        }

        return $next($request);
    }
}
