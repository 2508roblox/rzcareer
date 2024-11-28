<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureEmailIsVerified
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->is_email_verified) {
            return redirect('/')->with('error', 'Vui lòng xác thực email trước khi tiếp tục.');
        }

        return $next($request);
    }
}