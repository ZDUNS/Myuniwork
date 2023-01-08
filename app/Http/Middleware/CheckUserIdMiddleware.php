<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckUserIdMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Saņemaam autentificēto lietotāju
        $authenticatedUser = auth()->user()->id;
        // saņem id no route parametra
        $userId = $request->route('users')->id;
        // pārbaudām vai id sakrīt
        if ($authenticatedUser == $userId) {
            
            return $next($request);
        }
        
    }
}
