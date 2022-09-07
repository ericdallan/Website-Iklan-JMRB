<?php

namespace App\Http\Controllers;

use App\Models\HistoryNegotiations;
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
            ->join('users', 'negotiations.id_user', '=', 'users.id_user')
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
        return view('user.negotiation', compact('iklan', 'negotiation'));
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
            'time' => $request->time,
            'status_negotiation' => $request->status_negotiation
        ]);
        return redirect()->back()->with('success', 'Berhasil membuat negosiasi !');
    }
    public function update_nego(Request $request)
    {
        $id = $request->id_iklan;
        $request->validate([
            'id_user' => 'required',
            'id_iklan' => 'required',
            'rate_negotiation' => 'required',
        ]);
        //Update Negosiasi User
        Negotiation::find($id)->update([
            'rate_negotiation' => $request->rate_negotiation,
            'dokumen_teknis' => $request->dokumen_teknis,
            'status_negotiation' => 'Pengajuan Negosiasi User'
        ]);
        // Membuat History Negosiasi
        HistoryNegotiations::create([
            'id_negotiation' => $request->id_negotiation,
            'id_user' => $request->id_user,
            'HistoryRate_negotiation' => $request->rate_negotiation,
            'HistoryStatus_negotiation' => $request->status_negotiation,
            'time' => $request->time
        ]);
        $negosiasi = Negotiation::find($id);
        $dokumen_teknis = $request->dokumen_teknis;
        if ($dokumen_teknis != "") {
            if ($negosiasi->puc != '' && $negosiasi->dokumen_teknis != null) {
                $path = public_path('Dokumen/Dokumen_Teknis');
                $filePic = $path . $negosiasi->dokumen_teknis;
                unlink($filePic);
            }
            $dokumen_teknis = $dokumen_teknis->getClientOriginalName();
            $negosiasi->dokumen_teknis = $dokumen_teknis;
            $request->dokumen_teknis->move(public_path('Dokumen/Dokumen_Teknis'), $dokumen_teknis);
            $save = $negosiasi->save();
        }
        $save = $negosiasi->save();
        if ($save) {
            return redirect()->back()->with('success', 'Berhasil mengajukan negosiasi !');
        } else {
            return redirect()->back()->with('failed', 'Gagal mengajukan negosiasi !');
        }
    }
    public function update_negoAdmin(Request $request)
    {
        $id = $request->id_negotiation;
        $request->validate([
            'rate_negotiation' => 'required',
        ]);
        Negotiation::find($id)->update([
            'rate_negotiation' => $request->rate_negotiation,
            'status_negotiation' => $request->status_negotiation,
        ]);
         // Membuat History Negosiasi
         HistoryNegotiations::create([
            'id_negotiation' => $request->id_negotiation,
            'id_user' => $request->id_user,
            'HistoryRate_negotiation' => $request->rate_negotiation,
            'HistoryStatus_negotiation' => $request->status_negotiation,
            'time' => $request->time
        ]);
        return redirect()->back()->with('success', 'Berhasil melakukan update negosiasi !');
    }
}
