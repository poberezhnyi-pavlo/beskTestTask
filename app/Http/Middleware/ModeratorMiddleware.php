<?php

namespace App\Http\Middleware;

use App\Enums\UserType;
use App\Exceptions\AdminException;
use App\Exceptions\ModeratorException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class ModeratorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     * @throws AdminException
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->type !== UserType::MODERATOR) {
            throw ModeratorException::isNotModerator();
        }

        return $next($request);
    }
}
