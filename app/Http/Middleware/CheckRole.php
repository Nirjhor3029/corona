<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->role != ‘admin’)
        {
            // return new Response(view(‘unauthorized’)->with(‘role’, ‘ADMIN’));
            return redirect('home');

        }
        return $next($request);
                
    }
}
