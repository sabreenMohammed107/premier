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
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.customLogin');
    }



     /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'user_name';
    }

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
        if($user->role_id != 100 && $user->rol_id != 101 && $user->role_id != 110){
            $UserCompany = DB::table('users')
            ->join('user_companies','user_companies.user_id','=','users.id')
            ->where('users.id','=',$user->id)->first();

            Session::put('company_id', $UserCompany->company_id);
        }

        if ($request->remember) {
            Auth::login($user,true);
        }else{
            Auth::login($user);
        }

        return true;
    }

    /**
     * The user has been authenticated.
     * Method copied from "Illumunate\Foundation\Auth\AuthenticateUsers.php"
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if($user->role_id != 100 && $user->rol_id != 101 && $user->role_id != 110){
            return redirect('/Company');
        }else{
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
