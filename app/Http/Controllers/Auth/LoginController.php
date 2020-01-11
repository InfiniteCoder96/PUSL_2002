<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
    use Illuminate\Http\Request;
    use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Main Login function
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login_me(Request $request)
    {
        // assign all login input data to input array
        $input = $request->all();

        // validate input data using validator
        $this->validator($request->all())->validate();

        // check login attempt success
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {

            $request->session()->put('user_type', auth()->user()->user_type);

            return redirect()->route('dashboard');

        }else{ // if login attempt failed
            return redirect()->back()->with('message', "Invalid Credentials , Please try again.");
        }
    }

    // show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    //
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
