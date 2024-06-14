<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role; // Asumsikan Anda memiliki kolom 'role' di tabel pengguna

            if ($role === 'admin') {
                return redirect('/pengiriman');
            } elseif ($role === 'petugas') {
                return redirect('/pengiriman');
            } else {
                return redirect('/user/home');
            }
        }

        return $next($request);
    }
}