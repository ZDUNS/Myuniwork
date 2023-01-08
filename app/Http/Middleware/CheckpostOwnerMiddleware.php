<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CheckpostOwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Saņem autentificēto lietotāju
        $authenticatedUser = auth()->user()->id;
        // Saņemam lietotāja id no route parametra
        $postId = $request->route('posts')->id;
        $post = Post::where('id', $postId)->first();
        // pārbaudām vai autentificētais lietotaja id sakrīt
        if ($post && $authenticatedUser == $post->user_id) {
            return $next($request);
        }
        if (auth::check() && auth::user()->isAdmin()) {
            return $next($request);
        }
        return redirect('/');
    }
}
