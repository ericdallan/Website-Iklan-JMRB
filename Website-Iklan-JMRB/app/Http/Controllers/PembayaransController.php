<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use App\Models\Negotiation;
use App\Models\Pembayarans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PembayaransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {
        $pembayaran = DB::table('negotiations')->select('*')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->join('users', 'negotiations.id_user', '=', 'users.id_user')
            ->where('status_negotiation', '=', 'Negosiasi Diterima')
            ->where('negotiations.id_user', Auth::guard('web')->user()->id_user)
            ->get();
        return view('user.pembayaran', compact('pembayaran'));
    }
    public function detail_pembayaranUSer($id)
    {
        $pembayaran = DB::table('negotiations')->select('*')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->join('users', 'negotiations.id_user', '=', 'users.id_user')
            ->where('status_negotiation', '=', 'Negosiasi Diterima')
            ->where('negotiations.id_user', Auth::guard('web')->user()->id_user)
            ->get();
        $pembayaran_onboard = DB::table('negotiations')->select('*')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->join('users', 'negotiations.id_user', '=', 'users.id_user')
            ->where('negotiations.id_user', Auth::guard('web')->user()->id_user)
            ->where('status_negotiation', '=', 'Negosiasi Diterima')
            ->where('negotiations.id_negotiation', $id)
            ->get();
        return view('user.pembayaran', compact('pembayaran', 'pembayaran_onboard'));
    }
    public function indexAdmin()
    {
        $pembayaran = DB::table('pembayarans')->select('*')
            ->join('negotiations', 'pembayarans.id_negotiation', '=', 'negotiations.id_negotiation')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->join('users', 'negotiations.id_user', '=', 'users.id_user')
            ->where('status_pembayaran', '=', 'Menunggu Konfirmasi Pembayaran')
            ->get();
        return view('admin.pembayaran', compact('pembayaran'));
    }

    public function indexHistori()
    {
        $pembayaran = DB::table('pembayarans')->select('*')
            ->join('negotiations', 'pembayarans.id_negotiation', '=', 'negotiations.id_negotiation')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->join('users', 'negotiations.id_user', '=', 'users.id_user')
            ->get();
        return view('admin.history_pembayaran', compact('pembayaran'));
    }

    public function my_pembayaran()
    {
        $pembayaran = DB::table('pembayarans')->select('*')
            ->join('negotiations', 'pembayarans.id_negotiation', '=', 'negotiations.id_negotiation')
            ->join('iklans', 'negotiations.id_iklan', '=', 'iklans.id_iklan')
            ->join('users', 'negotiations.id_user', '=', 'users.id_user')
            ->where('negotiations.id_user', Auth::guard('web')->user()->id_user)
            ->get();
        return view('user.my_pembayaran', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_pembayaranUser(Request $request)
    {
        $id = $request->id_negotiation;
        $id2 = $request->id_iklan; 
        $request->validate([
            'id_user' => 'required',
            'id_iklan' => 'required',
            'id_negotiation' => 'required',
            'rate_negotiation' => 'required',
            'time' => 'required',
        ]);
        Negotiation::find($id)->update([
            'status_negotiation' => 'Tahap Pembayaran',
        ]);
        Iklan::find($id2)->update([
            'status' => 'Tahap Pembayaran',
        ]);
        $pembayaran = Pembayarans::create([
            'id_iklan' => $request->id_iklan,
            'id_user' => $request->id_user,
            'id_negotiation' => $request->id_negotiation,
            'rate_negotiation' => $request->rate_negotiation,
            'time' => $request->time,
            'status_pembayaran' => 'Menunggu Konfirmasi Pembayaran',
        ]);
        $bukti_pembayaran = $request->bukti_pembayaran;
        if ($bukti_pembayaran != "") {
            if ($pembayaran->puc != '' && $pembayaran->bukti_pembayaran != null) {
                $path = public_path('Dokumen/Bukti_Pembayaran');
                $filePic = $path . $pembayaran->bukti_pembayaran;
                unlink($filePic);
            }
            $bukti_pembayaran = $bukti_pembayaran->getClientOriginalName();
            $pembayaran->bukti_pembayaran = $bukti_pembayaran;
            $request->bukti_pembayaran->move(public_path('Dokumen/Bukti_Pembayaran'), $bukti_pembayaran);
            $save = $pembayaran->save();
        }
        $save = $pembayaran->save();
        if ($save) {
            return redirect()->back()->with('success', 'Berhasil membuat pembayaran !');
        } else {
            return redirect()->back()->with('failed', 'Gagal membuat pembayaran !');
        }
    }
    public function updatePembayaran(Request $request)
    {
        $id = $request->id_pembayaran;
        $id2 = $request->id_negotiation;
        $id3 = $request->id_iklan;
        $request->validate([
            'status_pembayaran' => 'required',
        ]);
        Pembayarans::find($id)->update([
            'status_pembayaran' => $request->status_pembayaran,
        ]);
        Negotiation::find($id2)->update([
            'status_negotiation' => $request->status_pembayaran,
        ]);
        Iklan::find($id3)->update([
            'status' => $request->status_pembayaran,
        ]);
        return redirect()->back()->with('success', 'Berhasil melakukan konfirmasi pembayaran !');
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
     * @param  \App\Models\Pembayarans  $pembayarans
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayarans $pembayarans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayarans  $pembayarans
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayarans $pembayarans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayarans  $pembayarans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayarans $pembayarans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayarans  $pembayarans
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayarans $pembayarans)
    {
        //
    }
}
