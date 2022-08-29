<?php

namespace App\Http\Controllers;

use App\Models\Forums;
use Illuminate\Http\Request;

class ForumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $forum = Forums::all();
        if ($request->filled('search')) {
            $forum = Forums::search($request->search)->get(); // search by value
        } else {
            $forum = Forums::get()->take('10'); // list 10 rows
        }
        return view('user.forum', compact('forum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Validate form
        $request->validate([
            'id_user' => 'required',
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'time' => 'required',
            'pic_forum' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);
        //create new chatroom
        $forum = new Forums();
        $forum->id_user = $request->id_user;
        $forum->title = $request->title;
        $forum->body = $request->body;
        $forum->category = $request->category;
        $forum->time = $request->time;
        //Pic Location
        $pic_forum = $request->pic_forum;
        if ($pic_forum != "") {
            if ($forum->puc != '' && $forum->pic_forum != null) {
                $path = public_path('Dokumen/Forum');
                $filePic = $path . $forum->pic_forum;
                unlink($filePic);
            }
            $pic_forum = $pic_forum->getClientOriginalName();
            $forum->pic_forum = $pic_forum;
            $request->pic_forum->move(public_path('Dokumen/Forum'), $pic_forum);
            $save = $forum->save();
        }
        $save = $forum->save();
        if ($save) {
            return redirect()->back()->with('success', 'Berhasil Membuat Forum !');
        } else {
            return redirect()->back()->with('failed', 'Gagal Membuat Forum !');
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
     * @param  \App\Models\Forums  $forums
     * @return \Illuminate\Http\Response
     */
    public function show(Forums $forums)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forums  $forums
     * @return \Illuminate\Http\Response
     */
    public function edit(Forums $forums)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forums  $forums
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forums $forums)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forums  $forums
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forums $forums)
    {
        //
    }
}
