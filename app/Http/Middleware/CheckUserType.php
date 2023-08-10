<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!!$request->user()->is_admin && $role == 'admin') {
            return $next($request);
        }

        if (!$request->user()->is_admin && $role == 'client') {
            return $next($request);
        }

        return response()->json(['message'=>'Não autorizado!'], 403);
    }

}
