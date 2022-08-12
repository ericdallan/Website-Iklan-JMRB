<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iklan = Iklan::all();
        return view('admin.iklan', compact('iklan'));
    }

    public function indexUser()
    {
        $iklan = Iklan::all();
        return view('user.iklan', compact('iklan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_iklan(Request $request)
    {
        //validate form
        $request->validate([
            'name' => 'required',
            'zone' => 'required',
            'location' => 'required',
            'pic_advert' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'rate' => 'required',
        ]);
        //create post
        $iklan = new Iklan();
        $iklan->name = $request->name;
        $iklan->zone = $request->zone;
        $iklan->location = $request->location;
        $iklan->rate = $request->rate;
        //Pic Location
        $picAdvert = $request->pic_advert;
        if ($picAdvert != "") {
            if ($iklan->puc != '' && $iklan->pic_advert != null) {
                $path = public_path('Dokumen/Iklan');
                $filePic = $path . $iklan->pic_advert;
                unlink($filePic);
            }
            $picAdvert = $picAdvert->getClientOriginalName();
            $iklan->pic_advert = $picAdvert;
            $request->pic_advert->move(public_path('Dokumen/Iklan'), $picAdvert);
            $save = $iklan->save();
        }
        $save = $iklan->save();
        if ($save) {
            return redirect()->back()->with('success', 'Berhasil membuat iklan !');
        } else {
            return redirect()->back()->with('failed', 'Gagal membuat iklan');
        }
    }
    public function update_iklan(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required',
            'zone' => 'required',
            'location' => 'required',
            'pic_advert' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'rate' => 'required',
        ]);
        //create post
        Iklan::find($id)->update([
            'name' => $request->name,
            'zone' => $request->zone,
            'location' => $request->location,
            'rate' => $request->rate,
        ]);
        //Upload Foto Profile
        $iklan = Iklan::find($id);
        //Pic Location
        $picAdvert = $request->pic_advert;
        if ($picAdvert != "") {
            if ($iklan->puc != '' && $iklan->pic_advert != null) {
                $path = public_path('Dokumen/Iklan');
                $filePic = $path . $iklan->pic_advert;
                unlink($filePic);
            }
            $picAdvert = $picAdvert->getClientOriginalName();
            $iklan->pic_advert = $picAdvert;
            $request->pic_advert->move(public_path('Dokumen/Iklan'), $picAdvert);
            $save = $iklan->save();
        }
        $save = $iklan->save();
        if ($save) {
            return redirect()->back()->with('success', 'Berhasil melakukan update iklan !');
        } else {
            return redirect()->back()->with('failed', 'Gagal melakukan update iklan');
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
     * @param  \App\Models\Iklan  $iklan
     * @return \Illuminate\Http\Response
     */
    public function show(Iklan $iklan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Iklan  $iklan
     * @return \Illuminate\Http\Response
     */
    public function edit(Iklan $iklan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Iklan  $iklan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Iklan $iklan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Iklan  $iklan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Iklan $iklan)
    {
        //
    }
}
