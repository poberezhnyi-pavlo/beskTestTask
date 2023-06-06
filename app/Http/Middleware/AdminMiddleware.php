<?php

namespace App\Http\Middleware;

use App\Enums\UserType;
use App\Exceptions\AdminException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     * @throws AdminException
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->type !== UserType::ADMIN) {
            throw AdminException::isNotAdmin();
        }

        return $next($request);
    }
}
