<?php

namespace App\Http\Controllers;

use App\Accident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccidentController extends Controller
{

    /**
     * showing all accidents
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function all()
    {
        $accidents = Accident::all();
        return view('accidents.all',compact('accidents'));
    }

    /**
     * showing all pending accidents
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pending()
    {
        $accidents = Accident::all()->where('status','=', 'pending');
        return view('accidents.pending',compact('accidents'));
    }

    /**
     * Display a listing of accidents of logged in user created.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accidents = Accident::all()->where('user_id','=',auth()->user()->id);
        return view('accidents.index',compact('accidents'));
    }


    /**
     * Show the form for creating a new accident.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(DB::table('accidents')->count() == 0){
            $id = 1;
        }
        else{
            $id = DB::table('accidents')->latest('id')->first()->id + 1;
        }

        return view('accidents.create',compact('id'));
    }

    /**
     * Store a newly created accdeint in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accident = new Accident(); // create new instance of accident class

        // get input data from the request
        $accident_name = $request->get('accident_name');
        $accident_desc = $request->get('accident_desc');
        $lat = $request->get('lat');
        $long = $request->get('long');

        // assigning images files into images array
        $images = $request->file('file');

        // assign input data into accident object
        $accident['name'] = $accident_name;
        $accident['description'] = $accident_desc;
        $accident['user_id'] = auth()->user()->id;
        $accident['lang'] = $long;
        $accident['lat'] = $lat;

        // storing images in application's storage file and sava name of the image in the database
        for($i = 0; $i < sizeof($images); $i++){
            $imageName = $accident_name . '_' . $i . '_' . auth()->user()->id . '.'.$images[$i]->extension();
            $images[$i]->move(public_path('images'),$imageName);

            $img = 'image_0' . ($i + 1);
            $accident[$img] = $imageName;
        }

        $accident->save();

        return response()->json(['success'=>'all']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function show(Accident $accident)
    {
        return view('accidents.show',compact('accident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function edit(Accident $accident)
    {
        return view('accidents.edit',compact('accident'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accident $accident)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $acc = Accident::all()->find($request->get('acc_id'));

        $acc->delete();

        return redirect()->route('accidents.index')
            ->with('success','Accident deleted successfully');
    }


    /**
     * show accident map
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view_accident_map(){

        $critical_accidents = Accident::select(DB::raw("COUNT(id) as count"))
            ->whereYear('created_at', date('Y'))
            ->where('condition', '=','critical')
            ->pluck('count');

        $normal_accidents = Accident::select(DB::raw("COUNT(id) as count"))
            ->whereYear('created_at', date('Y'))
            ->where('condition', '=','normal')
            ->pluck('count');

        $minor_accidents = Accident::select(DB::raw("COUNT(id) as count"))
            ->whereYear('created_at', date('Y'))
            ->where('condition', '=','minor')
            ->pluck('count');

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

        return view('accidents.map', compact(
            'accidents',
            'accidents_pending',
            'accidents_rejected',
            'accidents_approved',
            'critical_accidents',
            'normal_accidents',
            'minor_accidents'));
    }


    /**
     * approve accidents reported by drivers
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(Request $request){

        $request->validate([
            'acc_id' => 'required'
        ]);

        $acc_id = $request->get('acc_id'); // get accident id
        $acc_condition = $request->get('acc_condition'); // get accident id

        Accident::where('id','=',$acc_id)->update(array('status' => 'approved','condition' => $acc_condition)); // update accident's status

        return redirect()->back()->with('success','Accident has been approved !');
    }


    /**
     * reject accidents reported by driver
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request){

        $request->validate([
            'acc_id' => 'required'
        ]);

        $acc_id = $request->get('acc_id');

        Accident::where('id','=',$acc_id)->update(array('status' => 'rejected'));

        return redirect()->back()->with('unsuccess','Accident has been rejected !');
    }

    /**
     * search accidents based on user's location
     *
     * @param Request $request
     * @return false|string
     */
    public function searchAccidents(Request $request){

        $lat = $request->get('lat');
        $lang = $request->get('lang');

        $accidents = Accident::where('status', '=', 'approved')
            ->get();

        return json_encode($accidents);


    }

    /**
     * show only approved accidents
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function approved_list(){

        $accidents = Accident::where('status','=','approved')->get();

        return view('accidents.approved_list', compact('accidents'));
    }
}

