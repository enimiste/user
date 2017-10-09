<?php

namespace Acacha\User\Http\Middleware;

use Closure;

/**
 * Class GuestUser
 * @package Acacha\User\Http\Middleware
 */
class GuestUser
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
        view()->share('signedIn', auth()->check());
        view()->share('user', auth()->user() ?: app(\Acacha\User\GuestUser::class));
        return $next($request);
    }
}
