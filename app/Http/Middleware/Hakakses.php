<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Hakakses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     
     
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->guest() || !auth()->user()->level_admin) {
            abort(403);
        }

        return $next($request);
    }
}
