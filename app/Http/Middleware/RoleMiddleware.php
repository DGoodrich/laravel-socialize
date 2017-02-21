<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Spatie\Permission\Models\Role;

class RoleMiddleware
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
        if (Auth::guest()) {
            return redirect('/login');
        }

        if (!$request->user()->hasAnyRole(Role::all()) || $request->user()->is_banned) {
            abort(403);
        }

        return $next($request);
    }
}
