<?php

namespace App\Http\Controllers;

use App\Models\Chatroom;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreChatroomRequest;
use App\Http\Requests\UpdateChatroomRequest;
use App\Models\User;

class ChatroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {
        $admin = Admin::all();
        $chatroom = DB::table("chatrooms")->select('*')
            ->join('admins', 'chatrooms.id_admin', '=', 'admins.id_admin')
            ->where('chatrooms.id_user', Auth::guard('web')->user()->id_user)
            ->get();
        return view('user.chatroom', compact('admin', 'chatroom'));
    }
    public function indexAdmin()
    {
        $user = User::all();
        $chatroom = DB::table("chatrooms")->select('*')
            ->join('users', 'chatrooms.id_user', '=', 'users.id_user')
            ->where('chatrooms.id_admin', Auth::guard('admin')->user()->id_admin)
            ->get();
        return view('admin.chatroom', compact('user', 'chatroom'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createChatroomUser(Request $request)
    {
        //validate form
        $request->validate([
            'id_user' => 'required',
            'id_admin' => 'required',
        ]);
        //create new chatroom
        $chatroom = new Chatroom();
        $chatroom->id_user = $request->id_user;
        $chatroom->id_admin = $request->id_admin;
        $save = $chatroom->save();
        if ($save) {
            return redirect()->back()->with('success', 'Berhasil Membuat Chatroom !');
        } else {
            return redirect()->back()->with('failed', 'Gagal Membuat Chatroom');
        }
    }
    public function createChatroomAdmin(Request $request)
    {
        //validate form
        $request->validate([
            'id_user' => 'required',
            'id_admin' => 'required',
        ]);
        //create new chatroom
        $chatroom = new Chatroom();
        $chatroom->id_user = $request->id_user;
        $chatroom->id_admin = $request->id_admin;
        $save = $chatroom->save();
        if ($save) {
            return redirect()->back()->with('success', 'Berhasil Membuat Chatroom !');
        } else {
            return redirect()->back()->with('failed', 'Gagal Membuat Chatroom');
        }
    }
    public function detail_chatroom($id)
    {
        $admin = Admin::all();
        $chatroom = DB::table("chatrooms")->select('*')
            ->join('admins', 'chatrooms.id_admin', '=', 'admins.id_admin')
            ->where('chatrooms.id_user', Auth::guard('web')->user()->id_user)
            ->get();
        $chatroom_onboard = DB::table("chatrooms")->select('*')
            ->join('admins', 'chatrooms.id_admin', '=', 'admins.id_admin')
            ->where('chatrooms.id_user', Auth::guard('web')->user()->id_user)
            ->where('chatrooms.id_chatroom', $id)
            ->get();
        $message = DB::table("messages")->select("*")
            ->join('users', 'messages.id_user', '=', 'users.id_user')
            ->where('messages.id_user', Auth::guard('web')->user()->id_user)
            ->where('messages.id_chatroom', $id)
            ->get();
        return view('user.chatroom', compact('chatroom', 'chatroom_onboard', 'admin', 'message'));
    }
    public function detail_chatroomAdmin($id)
    {
        $user = User::all();
        $chatroom = DB::table("chatrooms")->select('*')
            ->join('users', 'chatrooms.id_user', '=', 'users.id_user')
            ->where('chatrooms.id_admin', Auth::guard('admin')->user()->id_admin)
            ->get();
        $chatroom_onboard = DB::table("chatrooms")->select('*')
            ->join('admins', 'chatrooms.id_admin', '=', 'admins.id_admin')
            ->where('chatrooms.id_admin', Auth::guard('admin')->user()->id_admin)
            ->where('chatrooms.id_chatroom', $id)
            ->get();
        $message = DB::table("messages")->select("*")
            ->join('users', 'messages.id_user', '=', 'users.id_user')
            ->join('admins', 'messages.id_admin', '=', 'admins.id_admin')
            ->where('messages.id_user', Auth::guard('admin')->user()->id_admin)
            ->where('messages.id_chatroom', $id)
            ->get();
        return view('admin.chatroom', compact('chatroom', 'chatroom_onboard', 'user', 'message'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChatroomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatroomRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chatroom  $chatroom
     * @return \Illuminate\Http\Response
     */
    public function show(Chatroom $chatroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chatroom  $chatroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Chatroom $chatroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChatroomRequest  $request
     * @param  \App\Models\Chatroom  $chatroom
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChatroomRequest $request, Chatroom $chatroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chatroom  $chatroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chatroom $chatroom)
    {
        //
    }
}
