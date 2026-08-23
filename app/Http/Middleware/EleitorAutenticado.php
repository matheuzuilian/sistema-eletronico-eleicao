<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EleitorAutenticado
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
   public function handle($request, Closure $next)
{
    if (!session('eleitor_id')) {
        return redirect()->route('login');
    }
    return $next($request);
}
}
