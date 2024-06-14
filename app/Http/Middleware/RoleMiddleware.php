<?php

// app/Http/Middleware/RoleMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        // Memeriksa apakah pengguna memiliki role yang diizinkan
        if ($user->role === $role) {
            return $next($request);
        }

        // Jika tidak, arahkan ke halaman yang sesuai atau tampilkan pesan error
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
    }
}