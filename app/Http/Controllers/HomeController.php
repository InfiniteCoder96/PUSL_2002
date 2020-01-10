<?php

namespace App\Http\Controllers;

use App\Accident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function showdashboard()
    {
        if (auth()->user()->user_type == 'admin') {
            return view('admin.dashboard');
        }
        else if (auth()->user()->user_type == 'police_rda') {
            return view('thirdparty.police_rda.dashboard');
        }else{

            $pending = DB::table('accidents')
                ->where([
                    ['user_id','=',auth()->user()->id],
                    ['status','=','pending']
                ])
                ->count();

            $approved = DB::table('accidents')
                ->where([
                    ['user_id','=',auth()->user()->id],
                    ['status','=','approved']
                ])
                ->count();

            $rejected = DB::table('accidents')
                ->where([
                    ['user_id','=',auth()->user()->id],
                    ['status','=','rejected']
                ])
                ->count();

            return view('user.dashboard',compact('pending','approved','rejected'));
        }
    }

    /*public function home()
    {
        return view('user.dashboard',compact('pending','approved','rejected'));
    }

    public function adminHome()
    {
        return view('admin.dashboard');
    }

    public function police_rda_index()
    {
        return view('thirdparty.police_rda.dashboard');
    }

    public function insurance_index()
    {
        return view('thirdparty.insurance.dashboard');
    }*/
}
