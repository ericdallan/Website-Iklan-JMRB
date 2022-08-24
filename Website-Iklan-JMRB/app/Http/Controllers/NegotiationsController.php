<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use App\Models\Negotiation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NegotiationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {
        $negotiation = DB::table("negotiations")->select('*')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->where('negotiations.id_user', Auth::guard('web')->user()->id_user)
            ->get();
        return view('user.negotiation', compact('negotiation'));
    }
    public function create_nego (Request $request)
    {
        //validate form
        $id = $request->id_iklan;
        $request->validate([
            'id_user' => 'required',
            'id_iklan' => 'required',
            'type' => 'required',
            'advert_type' => 'required',
            'month' => 'required',
            'sides' => 'required',
            'status_negotiation' => 'required',
        ]);
        Iklan::find($id)->update([
            'status' => $request->status_negotiation,
        ]);
        //create post
        Negotiation::create([
            'id_iklan' => $request->id_iklan,
            'id_user' => $request->id_user,
            'type' => $request->type,
            'advert_type' => $request->advert_type,
            'month' => $request->month,
            'sides' => $request->sides,
            'status_negotiation' => $request->status_negotiation
        ]);
        return redirect()->back()->with('success', 'Berhasil membuat negosiasi !');
    }
}
