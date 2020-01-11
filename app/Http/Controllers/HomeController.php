<?php

namespace App\Http\Controllers;

use App\Accident;
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
        // based on the user logged in redirect him to the dashboard
        if (auth()->user()->user_type == 'admin') {
            return view('admin.dashboard');
        }
        else if (auth()->user()->user_type == 'police_rda') {

            $accidents = Accident::select(DB::raw("COUNT(id) as count"))
                ->whereYear('created_at', date('Y'))
                ->pluck('count');

            $accidents_approved = Accident::select(DB::raw("COUNT(id) as count"))
                ->where('status', '=', 'approved')
                ->whereYear('created_at', date('Y'))
                ->pluck('count');

            $accidents_rejected = Accident::select(DB::raw("COUNT(id) as count"))
                ->where('status', '=', 'rejected')
                ->whereYear('created_at', date('Y'))
                ->pluck('count');

            $accidents_pending = Accident::select(DB::raw("COUNT(id) as count"))
                ->where('status', '=', 'pending')
                ->whereYear('created_at', date('Y'))
                ->pluck('count');

            return view('thirdparty.police_rda.dashboard',compact('accidents','accidents_approved','accidents_rejected','accidents_pending'));
        }
        else if (auth()->user()->user_type == 'insurance') {

            $accidents = Accident::select(DB::raw("COUNT(id) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');

            $accidents_approved = Accident::select(DB::raw("COUNT(id) as count"))
                ->where('status', '=', 'approved')
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');

            $accidents_rejected = Accident::select(DB::raw("COUNT(id) as count"))
                ->where('status', '=', 'rejected')
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');

            return view('thirdparty.insurance.dashboard',compact('accidents','accidents_approved','accidents_rejected'));
        }
        else if(auth()->user()->user_type == 'driver'){

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
        else{
            return redirect()->route('login');
        }
    }

}
