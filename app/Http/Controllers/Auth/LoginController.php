<?php

namespace App\Http\Controllers\Auth;

use App\Enum\UserStatus;
use App\Model\Menu;
use App\Model\Module;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }


    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if(Auth::user()->status != UserStatus::$ACTIVE){
                Auth::logout();
                Toastr::error('Your Account is not activated. Please take administration support', 'Error!');
                return redirect()->back();
            }


            /*
            *  menu session set
            */

            $all_menu =  array_column(json_decode(Menu::select('menu_url')->where('status', '1')->where('menu_url','!=',null)->get()->toJson(), true),'menu_url');

            $permission_menu_for_sideber_show =  json_decode(Menu::select(DB::raw('acl_menus.id, acl_menus.name, acl_menus.menu_url, acl_menus.parent_id, acl_menus.module_id,acl_menus.status'))
                ->join('acl_menu_permission', 'acl_menu_permission.menu_id', '=', 'acl_menus.id')
                ->where('acl_menu_permission.role_id',Auth::user()->role_id)
                ->where('acl_menus.status','1')
                ->whereNull('action')
                ->orderBy('module_group_id','ASC')
                ->get()->toJson(),true);

            $modules = json_decode(Module::get()->toJson(), true);

            $permission_menu = array_column(json_decode(Menu::join('acl_menu_permission', 'acl_menu_permission.menu_id', '=', 'acl_menus.id')
                ->where('role_id', Auth::user()->role_id)
                ->where('menu_url', '!=',null)
                ->get()->toJson(), true),'menu_url');

            session()->put('modules', $modules);
            session()->put('menus', $permission_menu_for_sideber_show);
            session()->put('all_menus', $all_menu);
            session()->put('permission_menu', $permission_menu);

            Toastr::success('Welcome To Dashboard !', 'Success!');
            return $this->sendLoginResponse($request);
        }else{
            Toastr::error('Your credentials does not match !', 'Error!');
            return redirect()->back();
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
