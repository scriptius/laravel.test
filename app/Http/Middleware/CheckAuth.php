<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth
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
        $userName = $request->headers->get('X-UserName');
        $password = $request->headers->get('X-Password');
        if (isset($userName) && 'admin' === $userName) {
            if (isset($password) && md5('123456') === md5($password)) {
                return $next($request);
            } else {
                return abort(401);
            }
        }
    }
}
