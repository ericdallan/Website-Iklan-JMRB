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
        //show login page
        return view('auth.login');
    }

    public function indexReg()
    {
        //show register page
        return view('auth.register');
    }

    public function storeReg(Request $request)
    {
        //Validate Register User
        $username = collect($request->username);
        $email = collect($request->email);
        if (User::where('username', $username )->exists()) {
            return redirect()->back()->with('failed', 'Username telah digunakan !');
        }elseif (User::where('email', $email )->exists()){
            return redirect()->back()->with('failed', 'Email telah digunakan !');
        }else {
            //Create Register User
            if (request()->password == request()->repassword) {
                User::create([
                    'username' => request()->username,
                    'email' => request()->email,
                    'company_name' => request()->company_name,
                    'password' => Hash::make(request()->password
                    )
                ]);
                return redirect('/login')->with('success', 'Registrasi Berhasil !');
            }else{
                return redirect()->back()->with('failed', 'Password tidak sama !');
            }
        }

    }
    public function loginuser(Request $request){
        //Validate Login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
            //Login User
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                
                session(['login' => true]);
                return redirect()->intended('/')->with('berhasil_login','Login Berhasil!');
            }else{
                return redirect('/login')->with('gagal_login','Email atau Password Salah!');
            }
    }
    public function loginadmin(Request $request){
        //Validat4e Admin
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
            //Login Admin
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                
                session(['login' => true]);
                return redirect()->intended('/')->with('berhasil_login','Login Berhasil!');
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
