<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Kiểm tra người dùng đã đăng nhập
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Kiểm tra người dùng có ít nhất một trong các vai trò được cung cấp
        // $user = Auth::user();
        // foreach ($roles as $role) {
        //     if ($user->hasRole($role)) {
        //         return $next($request);
        //     }
        // }

        // Nếu người dùng không có vai trò nào trong danh sách, chuyển hướng hoặc trả về lỗi
        // return abort(Response::HTTP_FORBIDDEN, 'Bạn không có quyền truy cập vào trang này.');
        return $next($request);
    }
}