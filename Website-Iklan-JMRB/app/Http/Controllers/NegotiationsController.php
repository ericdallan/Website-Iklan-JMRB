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
    public function indexAdmin(Request $request)
    {
        $negotiation2 = Negotiation::all();
        if ($request->filled('search')) {
            $negotiation = Negotiation::search($request->search)->get(); // search by value
        } else {
            $negotiation = Negotiation::get()->take('10'); // list 10 rows
        }
        $negotiation = DB::table("negotiations")->select('*')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->join('users','negotiations.id_user','=','users.id_user')
            ->get();
        return view('admin.negotiation', compact('negotiation2', 'negotiation'));
    }
    public function indexUser(Request $request)
    {
        $iklan = Iklan::all();
        if ($request->filled('search')) {
            $iklan = Iklan::search($request->search)->get(); // search by value
        } else {
            $iklan = Iklan::get()->take('10'); // list 10 rows
        }
        $negotiation = DB::table("negotiations")->select('*')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->where('negotiations.id_user', Auth::guard('web')->user()->id_user)
            ->get();
        return view('user.negotiation', compact('iklan','negotiation'));
    }
    public function detail_nego($id)
    {
        $negotiation = DB::table("negotiations")->select('*')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->where('negotiations.id_user', Auth::guard('web')->user()->id_user)
            ->get();
        $negotiation_onboard = DB::table("negotiations")->select('*')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->where('negotiations.id_user', Auth::guard('web')->user()->id_user)
            ->where('negotiations.id_negotiation', $id)
            ->get();
        return view('user.negotiation', compact('negotiation', 'negotiation_onboard'));
    }
    public function create_nego(Request $request)
    {
        //validate form
        $id = $request->id_iklan;
        $request->validate([
            'id_user' => 'required',
            'id_iklan' => 'required',
            'type' => 'required',
            'advert_type' => 'required',
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
            'sides' => $request->sides,
            'status_negotiation' => $request->status_negotiation
        ]);
        return redirect()->back()->with('success', 'Berhasil membuat negosiasi !');
    }
}
