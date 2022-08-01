<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $user = User::find($id);
        return view('user.profile', compact('user'));
    }

    public function editprofile($id)
    {
        $user = User::find($id);
        return view('user.edit_profile', compact('user'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateprofile(Request $request)
    {
        $id = $request->id;
        //validate form
        $rules = [
            'pic_profile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'email' => '|required|email|unique:users,email,' . $id . ',id_user',
            'username' => 'required|unique:users,username,' . $id . ',id_user'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with(['failed' => 'Gagal melakukan update profile, Email atau Username telah digunakan !']);
        } else {
            //create post
            User::find($id)->update([
                'username' => $request->username,
                'email' => $request->email,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'company_desc' => $request->company_desc,
            ]);
            //Upload Foto Profile
            $user = User::find($id);
            $picName = $request->pic_profile;
            if ($picName != "") {
                if ($user->puc != '' && $user->pic_profile != null) {
                    $path = public_path('Foto_Profile/User/');
                    $filePic = $path . $user->pic_profile;
                    unlink($filePic);
                }
                $picName = $picName->getClientOriginalName();
                $user->pic_profile = $picName;
                $request->pic_profile->move(public_path('Foto_Profile/User'), $picName);
                $user->save();
            }
            return redirect()->back()->with(['success' => 'Berhasil melakukan update profile!']);
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
