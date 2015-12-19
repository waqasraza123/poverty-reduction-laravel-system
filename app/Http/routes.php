<?php
use Illuminate\Support\Facades\Auth;
use App\Problem;
use Illuminate\Http\Response;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
    $totalProblems = Problem::count();

    $solvedProblems = Problem::where('solved', 1)->get()->count();

    $unsolvedProblems = Problem::where('solved', 0)->get()->count();

    return view('Pages.index', ['totalProblems' => $totalProblems, 'solvedProblems' => $solvedProblems, 'unsolvedProblems' => $unsolvedProblems]);
});

Route::get('donner', 'HomeController@index');

// Authentication routes...
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('needy', 'ProblemController@needyForm');

/*handle post request to save form data*/
Route::post('needy', 'ProblemController@save');

/*donner button routes*/
Route::post('donate-money-req/{id}', 'DonnerController@returnDonateMoneyView')->middleware('auth');
Route::get('donate-money-req/{id}', function(){
    return view("Pages.donate-money");
})->middleware('auth');

Route::post('donate-money', 'DonnerController@charge');
Route::post('donate-money-main', 'DonnerController@saveDetails');

Route::post('donate-things-req/{id}', 'DonnerController@returnDonateThingsView')->middleware('auth');
Route::post('donate-things-req/{id}', function(){
    return view('Pages.donate-things');
})->middleware('auth');



//update the dashboard
Route::post('update-donner-dashboard', 'DonnerController@updateDashboard');
Route::post('remove-cookie', 'DonnerController@destroyCookie');

//get the stats data for index page
Route::post('/', 'HomeController@getStats');


//individual problems get requests
Route::get("/problems/{id}", function($id){

    return view('Pages.individual-problems', ['id' => $id]);
});

//save the things form data
Route::post('submit-things', 'DonnerController@saveThingsForm');

//list current user problems
Route::get('problems', function(){
    return view('Partials.current-problems');
});

//problem is marked completed by needy
Route::post('problems/{id}/solved', 'ProblemController@solved');

//problem is cancelled by needy
Route::post('problems/{id}/cancel', 'ProblemController@cancel');


Route::get('test', function(){

    return Hash::make("0utsource32");
});
Route::post('test', function(\Illuminate\Http\Request $request){

    $token = $request->input('stripeToken');

    Auth::user()->subscription('main')->create($token);
    return 'Done';
});