<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();

        if (!$user) {
            return $next($request);
        }

        if (in_array($request->route()->getName(), exceptRoutes())) {
            return $next($request);
        }

        if (in_array($user->status, ['pending', 'reject']) && $request->route('user')?->id != $user->id) {
            return redirect()
                ->route('dashboard.profile.index')
                ->withErrors(['Akun Anda belum disetujui atau ditolak. Anda hanya dapat mengakses halaman profil.']);
        }

        return $next($request);
    }
}
