<?php namespace App\Http\Controllers;
use App\Problem;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('Pages.donner');
	}


	/**
	 * responds to post request at index.php
	 * @return Response
	 */
	public function getStats(){
        $totalProblems = Problem::count();

        $solvedProblems = Problem::where('solved', 1)->get()->count();

        $unsolvedProblems = Problem::where('solved', 0)->get()->count();

        $data = array($totalProblems, $solvedProblems, $unsolvedProblems);

        return response()->json($data);
	}
}
