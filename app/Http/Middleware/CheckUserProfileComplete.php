<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserProfileComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (in_array($request->route()->getName(), exceptRoutes())) {
            return $next($request);
        }

        if (!$user) {
            return $next($request);
        }

        $requiredFields = [
            'fullname',
            'username',
            'email',
            'phone',
            'address',
            'gender',
            'role',
            'birthdate',
            'status',
            'photo',
        ];

        foreach ($requiredFields as $field) {
            if (empty($user->{$field})) {
                return redirect()->route('dashboard.profile.index')
                    ->withErrors(['Silahkan lengkapi profil anda!']);
            }
        }

        return $next($request);
    }
}
