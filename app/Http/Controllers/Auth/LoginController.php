<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

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

    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'locked',
            'unlock'
        ]);
    }
    /** index page login */
    public function login()
    {
        return view('auth.login');
    }

    /** login with databases */
    public function authenticate(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);

            $email     = '@gmail.com';
            $username  = $request->username . $email;
            $password  = $request->password;

            if(App::environment('login_api'))
            {
                //   Get Token from API
                //   $http = new \GuzzleHttp\Client;
                $response = Http::post('http://localhost/example_api/public/api/login?', [
                    'headers' => [
                        'Authorization' => 'Bearer' .session()->get('token.access_token'),
                    ],
                    'query'=> [
                        'email'    => 'admin@gmail.com',
                        'password' => $password,
                    ]
                ]);

                $result = json_decode((string) $response->getBody(),true);
                Toastr::success('Login successfully :)','Success');
                return redirect()->intended('home');

            } elseif (App::environment('login_normal')) {
                if (Auth::attempt(['email'=>$username,'password'=>$password])) {
                /** get session */
                $user = Auth::User();
                Session::put('name', $user->name);
                Session::put('email', $user->email);
                Session::put('user_id', $user->user_id);
                Session::put('join_date', $user->join_date);
                Session::put('phone_number', $user->phone_number);
                Session::put('status', $user->status);
                Session::put('role_name', $user->role_name);
                Session::put('avatar', $user->avatar);
                Session::put('position', $user->position);
                Session::put('department', $user->department);
                Toastr::success('Login successfully :)','Success');
                return redirect()->intended('home');
                } else {
                    Toastr::error('fail, WRONG USERNAME OR PASSWORD :)','Error');
                    return redirect('login');
                }
            }
           
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('fail, LOGIN :)','Error');
            return redirect()->back();
        }
    }

    /** logout */
    public function logout( Request $request)
    {
        Auth::logout();
        // forget login session
        $request->session()->forget('name');
        $request->session()->forget('email');
        $request->session()->forget('user_id');
        $request->session()->forget('join_date');
        $request->session()->forget('phone_number');
        $request->session()->forget('status');
        $request->session()->forget('role_name');
        $request->session()->forget('avatar');
        $request->session()->forget('position');
        $request->session()->forget('department');
        $request->session()->flush();

        Toastr::success('Logout successfully :)','Success');
        return redirect('login');
    }

}
