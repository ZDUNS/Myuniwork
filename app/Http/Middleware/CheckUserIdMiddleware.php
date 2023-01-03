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
        // Get the authenticated user
        $authenticatedUser = auth()->user()->id;
        // Get the user id from the route parameter
        $userId = $request->route('users')->id;
        // Check if the authenticated user has the same id as the user in the route parameter
        if ($authenticatedUser == $userId) {
            // The authenticated user has the same id as the user in the route parameter, so proceed with the request
            return $next($request);
        }
        // The authenticated user does not have the same id as the user in the route parameter, so redirect to a different page or return a response
        return redirect('/');
    }
}
