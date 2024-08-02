<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        // Kiểm tra người dùng đã đăng nhập
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Kiểm tra người dùng có quyền cần thiết
        $user = Auth::user();
        if (!$user->can($permission)) {
            return abort(Response::HTTP_FORBIDDEN, 'Bạn không có quyền truy cập vào trang này.');
        }

        return $next($request);
    }
}