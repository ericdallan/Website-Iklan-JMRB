<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
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
        return view('admin.dashboard');
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
            return redirect()->intended('/dashboard')->with('success', 'Login Berhasil!');
        } else {
            return redirect()->back()->with('failed', 'Email atau Password Salah!');
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
