<?php namespace App\Http\Controllers;

use App\Donate;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Thing;
use Illuminate\Http\Request;
use Auth;
use App\Money;
use App\Problem;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;

class DonnerController extends Controller {



    /**
     * Listens to the post request at /donate-money
     * charges the user
     */
	public function charge(Request $request){
        $amount =  intval($request->input('amount'));
        $token = $request->input('stripeToken');
        $user = Auth::user();
        $user->charge($amount, [
            'source' => $token,
            'receipt_email' => $user->email,
        ]);

        return back()->with('status', 'Your Payment was successful.');


    }//charge method ends here

    /**
     * save user details when a user donates money
     * responds to post request on /donate-money-main route
     */
    public function saveDetails(Request $request){
        $money = new Money();
        $donate = new Donate();

        $donate->donorId = Auth::user()->id;
        $donate->moneyId = $request->input('id');
        $donate->thingId = 0;
        $donate->save();

        $money->name = $request->input('name');
        $money->organization = $request->input('organization');
        $money->phone = $request->input('phone');
        $money->email = $request->input('email');
        $money->state = $request->input('state');
        $money->city = $request->input('city');
        $money->cost = $request->input('amount');
        $money->address = $request->input('address');
        $money->problemId = $request->input('id');

        $money->save();

        return "done";
    }


    /**
     * @return collection object
     */
    public function getProblemsData(){
        $problems = Problem::where('solved', 0)->orderBy('id', 'desc')->get();
        return $problems;
    }

    /**
     * get all problems solved or not
     */
    public function getAllProblems(){
        return $allProblems = Problem::all();
    }


    /**
     * Update the donner dashboard
     * fetch new requests from db
     * responds to post request on /update-donner-dashboard route
     */
    public function updateDashboard(){
        $count = 0;
        $mainCount = 0;


        //first check if the cookie is set or not
        //this code will run when the count cookie is set
        if(Cookie::get('count')){

            //fetch only difference records(new records)
            $count = Problem::count();

            //check if new rows have been added to the table then send the new reply
            //else no need to send data
            if(Cookie::get('count') != $count){

                //if user entered a new form
                if($count > Cookie::get('count')){
                    $mainCount = $count - Cookie::get('count');
                    $problems = Problem::orderBy('id', 'desc')->take($mainCount)->get();

                    $response = new Response($problems);
                    $response->withCookie(cookie()->forever('count', $count));

                    return $response;
                }
                if($count < Cookie::get('count')){
                    $response = new Response("No New Problems");
                    return $response;
                }

                //$mainCount = max($count , Cookie::get('count')) - min($count , Cookie::get('count'));

                //setcookie("mainCount", $mainCount);
                //setcookie("1", "cookie was set but counts were not equal");
            }
            else{
                setcookie("2","cookie was set so no new results");
                $response = new Response("No New Problems");
                return $response;
            }
        }

        else{

            //fetch all records
            //this code will run first time when count cookie is not set

            $problems = Problem::orderBy('id', 'desc')->get();
            $count = $problems->count();

            //this cookie will expire in next 5 years
            setcookie("3", "cookie was not set so I am called");
            $response = new Response($problems);
            $response->withCookie(cookie()->forever('count', $count));
            return $response;

        }
    }

    /**
     * delete the count cookie
     * @return Response object
     */
    public function destroyCookie(){
        $cookie = Cookie::forget('count');
        $response = new Response($cookie);
        $response->withCookie($cookie);

        return $response;
    }


    /**
     * save the things form
     * @return string(success)
     */
    public function saveThingsForm(Request $request){
        $things = new Thing();
        $donate = new Donate();

        $donate->donorId = Auth::user()->id;
        $donate->moneyId = 0;
        $donate->thingId = $request->input('id');
        $donate->save();

        $things->name = $request->input('name');
        $things->location = $request->input('address');
        $things->description = $request->input('description');
        $things->quantity = $request->input('quantity');
        $things->problemId = $request->input('id');

        $things->save();

        return "done";
    }

    public function returnDonateMoneyView($id){
        return view('Pages.donate-money')->withId($id);
    }

    public function returnDonateThingsView($id){
        return view('Pages.donate-things')->withId($id);
    }
}
