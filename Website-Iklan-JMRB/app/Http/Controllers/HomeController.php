<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function landing_page()
    {
        return view('landing_page');
    }
    public function about_us()
    {
        return view('about_us');
    }
    public function iklan()
    {
        $iklan = DB::table("iklans")->select('*')
            ->join('users', 'iklans.id_user', '=', 'users.id_user')
            ->get();
        return view('iklan', compact('iklan'));
    }
}
