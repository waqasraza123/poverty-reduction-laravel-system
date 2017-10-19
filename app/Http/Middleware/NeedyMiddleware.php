<?php namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Closure;

class NeedyMiddleware {


    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest())
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else{
				return redirect()->guest('auth/login');
			}
		}
        //if user is donor do not let access needy page
        if($this->auth->user()->donner == 1)
        {
						$this->auth->logout();
            return view('auth.login')->with('status', 'Please Login/Register as Needy to access the Needy Dashboard.');
        }
		return $next($request);
	}

}
