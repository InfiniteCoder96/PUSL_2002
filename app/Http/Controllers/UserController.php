<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of drivers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = User::all()->where('user_type','=','driver');
        return view('admin.user_index',compact('drivers'));
    }

    /**
     * Display a listing of police / rda users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function police_rda_index()
    {
        $drivers = User::all()->where('user_type','=','police_rda');
        return view('admin.user_index',compact('drivers'));
    }

    /**
     * Display a listing of insurance users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insurance_index()
    {
        $drivers = User::all()->where('user_type','=','insurance');
        return view('admin.user_index',compact('drivers'));
    }


    /**
     * register form validator for third parties
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function thirdparty_validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nic' => ['required', 'string', 'max:10','min:10', 'unique:users'],
            'type' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    /**
     * show third party registration form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showThird_PartiesRegisterForm()
    {
        return view('auth.register_third_parties', ['url' => 'third_parties']);
    }

    /**
     * create third party user
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function createThird_Parties(Request $request)
    {
        $this->thirdparty_validator($request->all())->validate(); // validating inputs

        $third_parties = User::create([ // creating user
            'name' => $request['name'],
            'email' => $request['email'],
            'nic' => $request['nic'],
            'user_type' => $request['type'],
            'password' => Hash::make($request['password']),
        ]);

        // redirect the admin based on user's type created
        if($request->get('type') == 'insurance')
            return redirect('/third_parties/insurance_index')
                ->with('success','Insurance staff user added successfully.');
        else
            return redirect('/third_parties/police_rda_index')
                ->with('success','Police / RDA user added successfully.');
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
