<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'id_chatroom' => 'required',
            'id_user' => 'required',
            'id_admin' => 'required',
            'message' => 'required',
            'from' => 'required',
            'for' => 'required',
            'time' => 'required',
        ]);
        $date = Carbon::now();
        //create new message
        $message = new Message();
        $message->id_chatroom = $request->id_chatroom;
        $message->id_user = $request->id_user;
        $message->id_admin = $request->id_admin;
        $message->message = $request->message;
        $message->from = $request->from;
        $message->for = $request->for;
        $message->time =  $request->time;
        $save = $message->save();
        if ($save) {
            return redirect()->back()->with('success', 'Berhasil Mengirim Pesan !');
        } else {
            return redirect()->back()->with('failed', 'Gagal Mengirim Pesan');
        }
    }

    public function createMessageAdmin(Request $request)
    {
        //validate form
        $request->validate([
            'id_chatroom' => 'required',
            'id_user' => 'required',
            'id_admin' => 'required',
            'message' => 'required',
            'from' => 'required',
            'for' => 'required',
            'time' => 'required',
        ]);
        //create new message
        $message = new Message();
        $message->id_chatroom = $request->id_chatroom;
        $message->id_user = $request->id_user;
        $message->id_admin = $request->id_admin;
        $message->message = $request->message;
        $message->from = $request->from;
        $message->for = $request->for;
        $message->time = $request->time;
        $save = $message->save();
        if ($save) {
            return redirect()->back()->with('success', 'Berhasil Mengirim Pesan !');
        } else {
            return redirect()->back()->with('failed', 'Gagal Mengirim Pesan');
        }
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
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
