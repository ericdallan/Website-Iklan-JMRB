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
    // public function index(Request $request)
    // {
    //     $iklan = Iklan::all();
    //     if ($request->filled('search')) {
    //         $iklan = Iklan::search($request->search)->get(); // search by value
    //     } else {
    //         $iklan = Iklan::get()->take('10'); // list 10 rows
    //     }
    //     return view('admin.iklan', compact('iklan'));
    // }

    public function indexUser()
    {
        $negotiation = DB::table("negotiations")->select('*')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->where('negotiations.id_user', Auth::guard('web')->user()->id_user)
            ->get();
        return view('user.negotiation', compact('negotiation'));
    }
    public function create_nego(Request $request)
    {
        //validate form
        $request->validate([
            'id_user' => 'required',
            'id_iklan' => 'required',
            'type' => 'required',
            'advert_type' => 'required',
            'meter' => 'required',
            'month' => 'required',
            'sides' => 'required',
            'status_negotiation' => 'required',
        ]);
        //create post
        Negotiation::create([
            'id_iklan' => $request->id_iklan,
            'id_user' => $request->id_user,
            'type' => $request->type,
            'advert_type' => $request->advert_type,
            'meter' => $request->meter,
            'month' => $request->month,
            'sides' => $request->sides,
            'status_negotiation' => $request->status_negotiation
        ]);
        return redirect()->back()->with('success', 'Berhasil membuat negosiasi !');
    }
}
