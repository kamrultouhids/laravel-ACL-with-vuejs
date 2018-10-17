<?php

namespace App\Http\Middleware;

use Closure;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthCheckingMiddleWare
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
        if(isset(Auth::user()->role_id))
        {
            $role_id    = Auth::user()->role_id;
            $namedRoute = \Route::currentRouteName();

            if ($namedRoute)
            {
                $all_menu = Session::get('all_menus');
                if(in_array($namedRoute,$all_menu)){

                    $permissionCheck = Session::get('permission_menu');
                    if(!in_array($namedRoute,$permissionCheck)){
                        return response()->view('errors.404', [], 404);
                    }
                }
            }
        }
        return $next($request);
    }
}
