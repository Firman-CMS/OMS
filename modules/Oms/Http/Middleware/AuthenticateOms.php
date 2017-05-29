<?php

namespace Modules\Oms\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Route;
use Session;

class AuthenticateOms
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(!in_array(Route::currentRouteAction(), Session::get('permissions'))) {
            return Response('Unauthorized', 401);
        }

        return $next($request);
    }
}
