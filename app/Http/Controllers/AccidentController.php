<?php

namespace App\Http\Controllers;

use App\Accident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccidentController extends Controller
{

    public function all()
    {
        $accidents = Accident::all()->where('status','=', 'pending');
        return view('accidents.all',compact('accidents'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accidents = Accident::all()->where('user_id','=',auth()->user()->id);
        return view('accidents.index',compact('accidents'));
    }


    /**
     * Show the form for creating a new resource.
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accident = new Accident();

        $accident_name = $request->get('accident_name');
        $accident_desc = $request->get('accident_desc');
        $lat = $request->get('lat');
        $long = $request->get('long');

        $images = $request->file('file');

        $accident['name'] = $accident_name;
        $accident['description'] = $accident_desc;
        $accident['user_id'] = auth()->user()->id;
        $accident['lang'] = $long;
        $accident['lat'] = $lat;

        for($i = 0; $i < 2; $i++){
            $imageName = $images[$i]->getClientOriginalName();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function edit(Accident $accident)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accident $accident)
    {
        //
    }

    public function view_accident_map(){

        return view('accidents.map');
    }

    public function approve(Request $request){

        $request->validate([
            'acc_id' => 'required'
        ]);

        $acc_id = $request->get('acc_id');

        Accident::where('id','=',$acc_id)->update(array('status' => 'approved'));

        return redirect()->back()->with('success','Accident has been approved !');
    }

    public function reject(Request $request){

        $request->validate([
            'acc_id' => 'required'
        ]);

        $acc_id = $request->get('acc_id');

        Accident::where('id','=',$acc_id)->update(array('status' => 'rejected'));

        return redirect()->back()->with('unsuccess','Accident has been rejected !');
    }

    public function searchAccidents(Request $request){

        $lat = $request->get('lat');
        $lang = $request->get('lang');

        $accidents = Accident::whereBetween('lat', [$lat - 0.1, $lat + 0.1])
            ->whereBetween('lang', [$lang - 0.1, $lang + 0.1])
            ->where('status', '=', 'approved')
            ->get();

        return json_encode($accidents);


    }
}

