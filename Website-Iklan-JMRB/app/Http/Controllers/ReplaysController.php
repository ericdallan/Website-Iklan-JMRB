<?php

namespace App\Http\Controllers;

use App\Models\replays;
use Illuminate\Http\Request;

class ReplaysController extends Controller
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
    public function createReplay(Request $request)
    {
        //validate form
        $request->validate([
            'id_forum' => 'required',
            'id_user' => 'required',
            'owner_reply' => 'required',
            'reply_body' => 'required',
            'time_reply' => 'required',
            'reply_pict' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);
        //create new replay
        $replay = new replays();
        $replay->id_forum = $request->id_forum;
        $replay->id_user = $request->id_user;
        $replay->owner_reply = $request->owner_reply;
        $replay->reply_body = $request->reply_body;
        $replay->time_reply = $request->time_reply;
        $reply_pict = $request->reply_pict;
        if ($reply_pict != "") {
            if ($replay->puc != '' && $replay->reply_pict != null) {
                $path = public_path('Dokumen/Forum/Replay');
                $filePic = $path . $replay->reply_pict;
                unlink($filePic);
            }
            $reply_pict = $reply_pict->getClientOriginalName();
            $replay->reply_pict = $reply_pict;
            $request->reply_pict->move(public_path('Dokumen/Forum/Replay'), $reply_pict);
            $save = $replay->save();
        }
        $save = $replay->save();
        if ($save) {
            return redirect()->back()->with('success', 'Berhasil Membalas Forum !');
        } else {
            return redirect()->back()->with('failed', 'Gagal Membalas Forum');
        }
    }
    public function createReplayAdmin(Request $request)
    {
        //validate form
        $request->validate([
            'id_forum' => 'required',
            'id_admin' => 'required',
            'owner_reply' => 'required',
            'reply_body' => 'required',
            'time_reply' => 'required',
            'reply_pict' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);
        //create new replay
        $replay = new replays();
        $replay->id_forum = $request->id_forum;
        $replay->id_admin = $request->id_admin;
        $replay->owner_reply = $request->owner_reply;
        $replay->reply_body = $request->reply_body;
        $replay->time_reply = $request->time_reply;
        $reply_pict = $request->reply_pict;
        if ($reply_pict != "") {
            if ($replay->puc != '' && $replay->reply_pict != null) {
                $path = public_path('Dokumen/Forum/Replay');
                $filePic = $path . $replay->reply_pict;
                unlink($filePic);
            }
            $reply_pict = $reply_pict->getClientOriginalName();
            $replay->reply_pict = $reply_pict;
            $request->reply_pict->move(public_path('Dokumen/Forum/Replay'), $reply_pict);
            $save = $replay->save();
        }
        $save = $replay->save();
        if ($save) {
            return redirect()->back()->with('success', 'Berhasil Membalas Forum !');
        } else {
            return redirect()->back()->with('failed', 'Gagal Membalas Forum');
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
     * @param  \App\Models\replays  $replays
     * @return \Illuminate\Http\Response
     */
    public function show(replays $replays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\replays  $replays
     * @return \Illuminate\Http\Response
     */
    public function edit(replays $replays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\replays  $replays
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, replays $replays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\replays  $replays
     * @return \Illuminate\Http\Response
     */
    public function destroy(replays $replays)
    {
        //
    }
}
