<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
    use Illuminate\Http\Request;
    use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';


    public function login_me(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->user_type == 'admin') {

                $request->session()->put('user_type', auth()->user()->user_type);

                return redirect()->route('dashboard');
            }
            else if (auth()->user()->user_type == 'police_rda') {

                $request->session()->put('user_type', auth()->user()->user_type);

                return redirect()->route('dashboard');
            }
            else if (auth()->user()->user_type == 'insurance') {

                $request->session()->put('user_type', auth()->user()->user_type);

                return redirect()->route('dashboard');
            }
            else{
                return redirect()->route('dashboard');
            }
        }else{
            throw ValidationException::withMessages([
                $request->get('email') => [trans('auth.failed')],
            ]);
        }
    }


    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function logoutMe()
    {
        Session::flush();
        return redirect('/')->with('Status','Logged out Successfully');
    }

    public function driverLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return view('admin.dashboard');
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }


    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return view('admin.dashboard');
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function showThird_PartiesLoginForm()
    {
        return view('auth.login', ['url' => 'third_parties']);
    }

    public function Third_PartiesLogin(Request $request, string $type)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('third_parties')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            if($type == 'police_rda')
                return redirect('/third_parties/police_rda');
            else if($type == 'insurance')
                return redirect('/third_parties/insurance');
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
}
