<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class checkAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // nếu user đã đăng nhập
        if (Auth::check())
        {
            $admin = Auth::admin();
            // nếu level =1 (admin), status = 1 (actived) thì cho qua.
            if ( $admin->status == 1 )
            {
                return $next($request);
            }
            else
            {
                Auth::logout();
                return redirect()->route('getLogin');
            }
        } else
            return redirect('admin/login');

    }
}
