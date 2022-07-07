<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Rol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $rol)
    {

        if (!$request->user()->rol->rol == $rol) {
            return back();
        }
        return $next($request);
    }
}
