<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        //show dashboard admin
        $iklan = Iklan::all();
        $admin = Admin::all();
        $user = User::all();
        return view('admin.overview', compact('iklan','admin','user'));
    }
    public function dashboard_admin(Request $request)
    {
        //show dashboard admin
        $admin = Admin::all();
        if ($request->filled('search')) {
            $admin = Admin::search($request->search)->get(); // search by value
        } else {
            $admin = Admin::get()->take('10'); // list 10 rows
        }
        return view('admin.admin', compact('admin'));
    }
    public function dashboard_user(Request $request)
    {
        //show dashboard admin
        $user = User::all();
        if ($request->filled('search')) {
            $user = User::search($request->search)->get(); // search by value
        } else {
            $user = User::get()->take('10'); // list 10 rows
        }
        return view('admin.user', compact('user'));
    }
    public function profile($id)
    {
        $admin = Admin::find($id);
        return view('admin.profile_admin', compact('admin'));
    }
    public function editprofile($id)
    {
        $admin = Admin::find($id);
        return view('admin.editprofile_admin', compact('admin'));
    }
    public function updateprofile(Request $request)
    {
        $id = $request->id;
        //validate form
        $rules = [
            'pic_profile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'email' => 'required|email|unique:users,email,' . $id . ',id_user',
            'username' => 'required|unique:users,username,' . $id . ',id_user'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with(['failed' => 'Gagal melakukan update profile, Email atau Username telah digunakan !']);
        } else {
            //create post
            Admin::find($id)->update([
                'username' => $request->username,
                'email' => $request->email,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'division' => $request->division,
            ]);
            //Upload Foto Profile
            $admin = Admin::find($id);
            $picName = $request->pic_profile;
            if ($picName != "") {
                if ($admin->puc != '' && $admin->pic_profile != null) {
                    $path = public_path('Foto_Profile/Admin/');
                    $filePic = $path . $admin->pic_profile;
                    unlink($filePic);
                }
                $picName = $picName->getClientOriginalName();
                $admin->pic_profile = $picName;
                $request->pic_profile->move(public_path('Foto_Profile/Admin'), $picName);
                $admin->save();
            }
            return redirect()->back()->with(['success' => 'Berhasil melakukan update profile!']);
        }
    }
    public function index()
    {
        //show login page
        return view('admin.login');
    }
    public function create_admin(Request $request)
    {
        //Validate Register Admin
        $username = collect($request->username);
        $email = collect($request->email);
        if (Admin::where('username', $username)->exists()) {
            return redirect()->back()->with('failed', 'Username telah digunakan !');
        } elseif (Admin::where('email', $email)->exists()) {
            return redirect()->back()->with('failed', 'Email telah digunakan !');
        } else {
            //Create Register Admin
            if (request()->password == request()->repassword) {
                Admin::create([
                    'username' => request()->username,
                    'email' => request()->email,
                    'first_name' => request()->first_name,
                    'last_name' => request()->last_name,
                    'password' => Hash::make(
                        request()->password
                    )
                ]);
                return redirect()->back()->with('success', 'Admin berhasil ditambahkan !');
            } else {
                return redirect()->back()->with('failed', 'Password tidak sama !');
            }
        }
    }
    public function login(Request $request)
    {
        //Validat4e Admin
        $credentials = $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required',
        ]);
        //Login Admin
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            session(['login' => true]);
            return redirect()->intended('/dashboard')->with('success', 'Selamat Datang di Dashboard Admin !');
        } else {
            return redirect('/login/admin')->with('failed', 'Email atau Password Salah!');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $request->session()->forget('login');

        return redirect('/');
    }
    public function delete_admin(Admin $admin, $id)
    {
        if($admin=Admin::find($id)){
            $admin->delete();
            return redirect()->back()->with('success', 'Admin berhasil dihapus !');
        }else{
            return redirect()->back()->with('failed', 'Admin gagal dihapus !');
        }
    }
}
