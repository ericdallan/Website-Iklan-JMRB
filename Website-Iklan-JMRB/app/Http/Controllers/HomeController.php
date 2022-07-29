<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function landing_page()
    {
        return view('landing_page');
    }
    public function about_us()
    {
        return view('about_us');
    }
    public function iklan()
    {
        return view('iklan');
    }
    // public function LoginUser()
    // {
    //     return view('user.login_user');
    // }
    // public function RegisterUser()
    // {
    //     return view('user.register_user');
    // }
    // public function LoginAdmin()
    // {
    //     return view('admin.login_admin');
    // }
}
