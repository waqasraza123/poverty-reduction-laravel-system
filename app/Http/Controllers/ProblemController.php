<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Problem;

use Illuminate\Http\Request;

class ProblemController extends Controller {

        /**
         * specify the middleware
         */
        public function __construct()
        {
                $this->middleware('auth');
        }


        /**
         * show the needy form on get request
         */

        public function needyForm(){
            return view('Pages.needy');
        }


        /**
         * set the needy cookie
         */
        public function setNeedyCookie(){
            if(isset($_POST['needy-button'])){
                return "needy clicked";
            }
        }


        /**
         * save needy form records into database
         * return redirect to same page
         */
        public function save(Request $request){
            $problem = new Problem();
            $problem->name = ucwords($request->input('name'));
            $problem->phone = $request->input('phone');
            $problem->address = $request->input('address');
            $problem->problem = $request->input('problem');
            $problem->severity = $request->input('severity');
            $problem->cost = $request->input('cost');
            $problem->save();//else record wont be saved

            return back()->with('status','Your Problem has been submitted. Please be patience while a Donner volunteer to help you. Thanks');
    }
}
