<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


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
    public function index()
    {
        return view('auth.login');
    }

    public function indexReg()
    {
        return view('auth.register');
    }

    public function storeReg()
    {
        User::create([
            'username' => request()->username,
            'email' => request()->email,
            'company_name' => request()->company_name,
            'password' => Hash::make(request()->password)
        ]);
        return redirect('/');
    }
    public function loginpersonal(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                
                session(['login' => true]);
                return redirect()->intended('/About_Us')->with('berhasil_login','Login Berhasil!');
            }else{
                return redirect('/login')->with('gagal_login','Email atau Password Salah!');
            }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();

        $request->session()->forget('login');
    
        return redirect('/');
    }
}
