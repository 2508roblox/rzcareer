<?php

namespace App\Http\Middleware;

 
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginEmployer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Kiểm tra xem user có has_company = 1 hay không
            if ($user->has_company == 1) {
                return $next($request);
            }else{
            return redirect('/');

            }
        } else {
            // Nếu người dùng chưa đăng nhập, chuyển hướng tới trang đăng nhập
            return redirect('/employer/login');
        }
    }
}
