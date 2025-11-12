<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Feltételezzük, hogy a felhasználónak van egy "is_admin" mezője az adatbázisban
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Ehhez az oldalhoz nincs jogosultságod.');
        }

        return $next($request);
    }
}
