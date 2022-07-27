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
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('landing_page');
    }
    public function profil()
    {
        return view('profil_perusahaan');
    }
    public function Iklan()
    {
        return view('Iklan');
    }
    public function LoginUser()
    {
        return view('user.login_user');
    }
    public function RegisterUser()
    {
        return view('user.register_user');
    }
    public function LoginAdmin()
    {
        return view('admin.login_admin');
    }
}
