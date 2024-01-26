<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PostOwnerMiddleware
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
        // get the post id from the request
        // get the phone id from the request
        $post =  $request->route('post');

        if($post->user_id != auth()->user()->id) {
            return redirect('/my-posts')->with('error','Sorry, you are not the owner of this post.');
        }
        return $next($request);
    }
}
