<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RangoAltoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check() && (auth()->user()->rol === 'Administrador' || auth()->user()->rol === 'Hermano Mayor' || auth()->user()->rol === 'Presidente Vocalia')){
            return $next($request);
        }
        return redirect('');


    }
}
