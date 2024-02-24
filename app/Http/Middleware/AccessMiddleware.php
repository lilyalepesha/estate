<?php

namespace App\Http\Middleware;

use App\Enums\RoleEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            ($request->user() && $request->user()->role === RoleEnum::ADMIN->value)
            || (auth()->guard('architects')->check() && auth()->guard('architects')->user()->verified)
        ) {
            return $next($request);
        }

        return redirect()->route('main')->with('danger', 'У вас нет доступа к этой странице');
    }
}
