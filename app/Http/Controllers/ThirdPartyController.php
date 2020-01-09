<?php

namespace App\Http\Controllers;

use App\ThirdParty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ThirdPartyController extends Controller
{

    protected function thirdparty_validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:third_parties'],
            'type' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function showThird_PartiesRegisterForm()
    {
        return view('auth.register_third_parties', ['url' => 'third_parties']);
    }

    protected function createThird_Parties(Request $request)
    {
        $this->thirdparty_validator($request->all())->validate();
        $third_parties = ThirdParty::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => $request['type'],
            'password' => Hash::make($request['password']),
        ]);

        if($request->get('type') == 'insurance')
            return redirect('/third_parties/insurance_index')
                ->with('success','Insurance staff user added successfully.');
        else
            return redirect('/third_parties/police_rda_index')
                ->with('success','Police / RDA user added successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function police_rda_index()
    {
        $type = 'police_rda';
        $third_parties = ThirdParty::all()->where('type','=', 'police_rda');
        return view('admin.third_party_index',compact('third_parties','type'));
    }

    public function insurance_index()
    {
        $type = 'insurance';
        $third_parties = ThirdParty::all()->where('type','=', 'insurance');
        return view('admin.third_party_index',compact('third_parties','type'));
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
     * @param  \App\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function show(ThirdParty $thirdParty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function edit(ThirdParty $thirdParty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ThirdParty $thirdParty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThirdParty $thirdParty)
    {
        //
    }
}
