<?php

namespace App\Http\Controllers;

use App\Models\HistoryNegotiations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HistoryNegotiationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = DB::table("negotiations")->select('*')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->where('negotiations.id_user', Auth::guard('web')->user()->id_user)
            ->get();
        return view('user.history_negosiasi', compact('history'));
    }

    public function indexAdmin()
    {
        $history = DB::table("negotiations")->select('*')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->join('users', 'negotiations.id_user', '=', 'users.id_user')
            ->join('history_negotiations','history_negotiations.id_negotiation','=','history_negotiations.id_negotiation')
            ->get();
        $history_list = DB::table("history_negotiations")->select('*')
            ->join('negotiations', 'history_negotiations.id_negotiation', '=', 'negotiations.id_negotiation')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->get();
            return view('admin.history_negosiasi', compact('history','history_list'));
    }

    public function detail_history($id)
    {
        $history = DB::table("negotiations")->select('*')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->where('negotiations.id_user', Auth::guard('web')->user()->id_user)
            ->get();
        $history_onboard = DB::table("negotiations")->select('*')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->where('negotiations.id_user', Auth::guard('web')->user()->id_user)
            ->where('negotiations.id_negotiation', $id)
            ->get();
        $history_list = DB::table("history_negotiations")->select('*')
            ->join('negotiations', 'history_negotiations.id_negotiation', '=', 'negotiations.id_negotiation')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->where('history_negotiations.id_user', Auth::guard('web')->user()->id_user)
            ->where('history_negotiations.id_negotiation', $id)
            ->get();
        return view('user.history_negosiasi', compact('history', 'history_onboard','history_list'));
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
     * @param  \App\Models\HistoryNegotiations  $historyNegotiations
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryNegotiations $historyNegotiations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryNegotiations  $historyNegotiations
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryNegotiations $historyNegotiations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoryNegotiations  $historyNegotiations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryNegotiations $historyNegotiations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryNegotiations  $historyNegotiations
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryNegotiations $historyNegotiations)
    {
        //
    }
}
