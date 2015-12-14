<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\User;
use Illuminate\Http\Request;
use Hash;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;
	protected $redirectPath = '/donner';


    /**
     * check if needy cookie is set
     * then get the cookie se we can register the needy
     */
    public function getNeedyCookie(){
        return isset($_COOKIE['username'])? $_COOKIE['username'] : "";
    }


    /**
     * remove the needy cookie once data is
     * saved to the db
     */
    public function removeNeedyCookie(){
        return setcookie("username", "", time() - 3600);
    }

    public function postRegister(Request $request){

        $needyCookie = $this->getNeedyCookie();

        $user = new User();
        $user->name = ucwords($request->input('name'));
        $user->email = strtolower($request->input('email'));
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->donner = (($needyCookie)=="needy") ? 0 : 1;//user is donner
		$user->password = Hash::make($request->input('password'));

        $user->save();

        //remove the needy cookie
        $cookie_name = 'username';
        unset($_COOKIE[$cookie_name]);
        // empty value and expiration one hour before
        $res = setcookie($cookie_name, '', time() - 3600);

        return redirect('/donner');
    }

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

}
