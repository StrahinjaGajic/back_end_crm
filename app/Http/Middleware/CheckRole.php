<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (auth()->check()) {
            $neededRole = Role::where('name', $role)->firstOrFail();

            if (auth()->user()->highestRole()->level >= $neededRole->level) {
                return $next($request);
            }

            abort(403);
        }
        return $next($request);
    }
}