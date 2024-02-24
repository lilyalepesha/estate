<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArchitectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            !auth()->guard('architects')->check()
            && !auth()->guard('architects')->user()->verified
        ) {
            return redirect()->route('main')->with('danger', 'У вас нет доступа к этой странице.');

        }

        return $next($request);
    }
}
