<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    public function handle($request, Closure $next)
{
    if (auth()->user()->role != 'superadmin') {
        abort(403, 'Akses tidak diizinkan');
    }
    return $next($request);
}

}
