<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($request->user()->role !== $role) {
            // Tampilkan halaman error 403 (Akses Ditolak)
            abort(403, 'Akses Ditolak! Anda bukan ' . $role . '.');
        }

        return $next($request);
    }
}
