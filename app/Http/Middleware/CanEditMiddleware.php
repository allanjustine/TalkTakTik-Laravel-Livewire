<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CanEditMiddleware
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
        $post = $request->route('post');

        if(!$post->isEditable()){
            return redirect('/my-post')->with('error', 'Sorry you are not allowed to edit this post.');
        }
        return $next($request);
    }
}
