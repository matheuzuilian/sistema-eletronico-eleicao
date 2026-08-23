<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAutenticado
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('admin_id')) {
            return redirect()->route('loginAdm');
        }
        return $next($request);
    }
}