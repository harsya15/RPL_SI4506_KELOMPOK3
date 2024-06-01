<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KaryawanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role == 'karyawan')
        {
            return $next($request);
        } 
        elseif (auth()->user()->role == 'customer')
        {
            abort(403, 'You do not have permission to access this page');
        } 
        elseif (auth()->user()->role == 'manager')
        {
            abort(403, 'You do not have permission to access this page');
        }
    }
}
