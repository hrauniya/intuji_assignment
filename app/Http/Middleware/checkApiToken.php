<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class checkApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json(['message' => 'Invalid token'], 401);
        }
        $user = PersonalAccessToken::findToken($token)->tokenable;
        if (!$user) {
            return response()->json(['message' => 'Invalid token'], 401);
        }
        $request->user = $user;
        return $next($request);
    }
}
