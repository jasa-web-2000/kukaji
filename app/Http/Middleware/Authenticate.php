<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('landing.login');
    }

    public function handle($request, \Closure $next, ...$guards)
    {
        if ($this->auth->guard($guards)->guest()) {
            if ($request->expectsJson()) {
                abort(401);
            }

            return redirect()->route('landing.login')->withErrors(['Anda belum login!']);
        }

        return $next($request);
    }
}
