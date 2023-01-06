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
        // Get the authenticated user
        $authenticatedUser = auth()->user()->id;
        // Get the user id from the route parameter
        $postId = $request->route('posts')->id;
        $post = Post::where('id', $postId)->first();
        // Check if the authenticated user has the same id as the user in the route parameter
        if ($post && $authenticatedUser == $post->user_id) {
            // The authenticated user has the same id as the user in the route parameter, so proceed with the request
            return $next($request);
        }
        if (auth::check() && auth::user()->isAdmin()) {
            return $next($request);
        }
        // The authenticated user does not have the same id as the user in the route parameter, so redirect to a different page or return a response
        return redirect('/');
    }
}
