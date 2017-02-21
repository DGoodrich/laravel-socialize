<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if($request->user()->username === $request->route('user') || $request->user()->hasRole(['Admin', 'Superuser'])) {
            return $next($request);
        }

        return view('errors.403');
    }
}
