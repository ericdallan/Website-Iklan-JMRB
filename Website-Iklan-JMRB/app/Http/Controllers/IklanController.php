<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use App\Models\Negotiation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $iklan = Iklan::all();
        if ($request->filled('search')) {
            $iklan = Iklan::search($request->search)->get(); // search by value
        } else {
            $iklan = Iklan::get()->take('10'); // list 10 rows
        }
        return view('admin.iklan', compact('iklan'));
    }

    public function indexUser()
    {
        $iklan = DB::table("iklans")->select('*')
            ->join('users', 'iklans.id_user', '=', 'users.id_user')
            ->where('iklans.id_user', Auth::guard('web')->user()->id_user)
            ->get();
        return view('user.iklan', compact('iklan'));
    }

    public function surveyUser()
    {
        $iklan = DB::table("iklans")->select('*')
            ->join('users', 'iklans.id_user', '=', 'users.id_user')
            ->where('iklans.id_user', Auth::guard('web')->user()->id_user)
            ->get();

        return view('user.survey', compact('iklan'));
    }

    public function surveyAdmin(Request $request)
    {
        $iklan = DB::table("iklans")->select('*')
            ->join('users','iklans.id_user','=','users.id_user')
            ->get();
        if ($request->filled('search')) {
            $iklan = Iklan::search($request->search)->get(); // search by value
        } else {
            $iklan = Iklan::get()->take('10'); // list 10 rows
        }
        return view('admin.survey', compact('iklan'));
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
            'id_user' => 'required',
            'name' => 'required',
            'zone' => 'required',
            'location' => 'required',
            'pic_advert' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'status' => 'required',
            'maps_coord' => 'required',
        ]);
        //create post
        $iklan = new Iklan();
        $iklan->name = $request->name;
        $iklan->id_user = $request->id_user;
        $iklan->zone = $request->zone;
        $iklan->location = $request->location;
        $iklan->status = $request->status;
        $iklan->maps_coord = $request->maps_coord;
        $iklan->survey_date = $request->survey_date;
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
    public function update_survey(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required',
            'zone' => 'required',
            'location' => 'required',
            'pic_advert' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'status' => 'required',
            'maps_coord' => 'required',
            'survey_date' => 'required|date|after:tomorrow',
        ],[
            'survey_date.after' => 'Minimal tanggal survey 1 hari dari hari ini'
        ]);
        //create Iklan
        Iklan::find($id)->update([
            'name' => $request->name,
            'zone' => $request->zone,
            'location' => $request->location,
            'status' => $request->status,
            'maps_coord' => $request->maps_coord,
            'survey_date' => $request->survey_date,
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
            return redirect()->back()->with('success', 'Berhasil melakukan update survey !');
        } else {
            return redirect()->back()->with('failed', 'Gagal melakukan update survey !');
        }
    }
    public function update_surveyUser(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required',
            'zone' => 'required',
            'location' => 'required',
            'pic_advert' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'status' => 'required',
            'maps_coord' => 'required',
            'survey_date' => 'required|date|after:tomorrow',
        ],[
            'survey_date.after' => 'Minimal tanggal survey 1 hari dari hari ini'
        ]);
        //create Iklan
        Iklan::find($id)->update([
            'name' => $request->name,
            'zone' => $request->zone,
            'location' => $request->location,
            'status' => $request->status,
            'maps_coord' => $request->maps_coord,
            'survey_date' => $request->survey_date,
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
            return redirect()->back()->with('success', 'Berhasil melakukan update survey !');
        } else {
            return redirect()->back()->with('failed', 'Gagal melakukan update survey !');
        }
    }
    public function UploadBA_Survey(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'ba_survey' => 'required',
        ]);
        //create Iklan
        Iklan::find($id)->update([
            'ba_survey' => $request->ba_survey,
        ]);
        //Upload BA Survey
        $iklan = Iklan::find($id);
        //Pic Location
        $ba_Survey = $request->ba_survey;
        if ($ba_Survey != "") {
            if ($iklan->puc != '' && $iklan->ba_survey != null) {
                $path = public_path('Dokumen/BA_Survey');
                $filePic = $path . $iklan->ba_survey;
                unlink($filePic);
            }
            $ba_Survey = $ba_Survey->getClientOriginalName();
            $iklan->ba_survey = $ba_Survey;
            $request->ba_survey->move(public_path('Dokumen/BA_Survey'), $ba_Survey);
            $save = $iklan->save();
        }
        $save = $iklan->save();
        if ($save) {
            return redirect()->back()->with('success', 'Berhasil melakukan update survey !');
        } else {
            return redirect()->back()->with('failed', 'Gagal melakukan update survey !');
        }
    }
    public function delete_iklan(Iklan $iklan, $id)
    {
        if ($iklan = Iklan::find($id)) {
            $iklan->delete();
            return redirect()->back()->with('success', 'Iklan berhasil dihapus !');
        } else {
            return redirect()->back()->with('failed', 'Iklan gagal dihapus !');
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
