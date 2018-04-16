<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAjaxToken
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
        if ($request->ajax()) {
            $token = $request->header('X-CSRF-Token');

            if ($request->session()->token() == $token) {
                return $next($request);
            } else {
                abort(404);
            }
        } else {
            return $next($request);
        }
    }
}
