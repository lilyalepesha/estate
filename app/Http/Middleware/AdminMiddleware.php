<?php

namespace App\Http\Middleware;

use App\Enums\RoleEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() && $request->user()?->role != RoleEnum::ADMIN->value) {
            return redirect()->route('main')->with('danger', 'У вас нет доступа к этой странице.');
        }

        return $next($request);
    }
}
