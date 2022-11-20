<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateCustom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('Authorization', '');

        $position = strrpos($header, 'Basic ');

        $user = null;
        $pass = null;
        if ($position !== false) {
            $header = substr($header, $position + 6);
            $header = base64_decode($header);
            $header = explode(':', $header);

            $user = $header[0];
            $pass = $header[1];
        }

        if ($user !== env('AUTH_USER') || $pass !== env('AUTH_PASS')) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        return $next($request);
    }
}
