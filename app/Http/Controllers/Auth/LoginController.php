<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserCompany;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
        $this->middleware('guest')->except('logout');
    }
    //to login without inception
    protected function attemptLogin(Request $request)
    {

        $user = User::where('user_name', $request->user_name)
            ->where('password', $request->password)
            ->first();
        if (!isset($user)) {
            return false;
        }

        $UserCompany = DB::table('users')
        ->join('user_companies','user_companies.user_id','=','users.id')
        ->where('users.id','=',$user->id)->first();

        Session::put('company_id', $UserCompany->company_id);
        \Auth::login($user);



        return true;
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
