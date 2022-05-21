<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param string[] ...$guards
     * @return mixed
     * @throws AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards): mixed
    {
        $token = $request->header('Api-Token');
        if (!self::validateToken($token)) {
            throw new AuthenticationException();
        }
        return $next($request);
    }

    private function validateToken(?string $token): bool
    {
        return true; // TODO implement
    }
}
