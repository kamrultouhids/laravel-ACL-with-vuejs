<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect(url('/'));
    }

   public function index()
   {
       return view('index');
   }
}
