<?php

namespace App\Http\Controllers;

use App\Models\Chatroom;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChatroomRequest;
use App\Http\Requests\UpdateChatroomRequest;

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
        $chatroom = Chatroom::all();
        return view('user.chatroom', compact('admin', 'chatroom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMessageUser(Request $request)
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
            return redirect()->back()->with('success', 'Berhasil Mengirim Pesan !');
        } else {
            return redirect()->back()->with('failed', 'Gagal Mengirim Pesan');
        }
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
