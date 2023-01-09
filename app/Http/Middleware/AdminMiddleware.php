<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
// Pārbaudām, vai lietotājs ir administrators, ja nav, tad piekļuve tiek liegta un lietotājs ir pāradresēts uz citu skatu.
    {
        if (!(auth::check() && auth::user()->isAdmin())) {
            return redirect('welcome')->withErrors('Piekļuve administratora funkcijām ir aizliegta!');
        }
        return $next($request);
    }
}
