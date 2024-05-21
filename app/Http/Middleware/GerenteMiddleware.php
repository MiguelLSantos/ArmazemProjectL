<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GerenteMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->is_gerente) {
            return $next($request);
        }

         response()->json(['error' => 'Acesso não autorizado.'], 403);
         return redirect('/');
    }
}
