<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Problem;

use Illuminate\Http\Request;

class ProblemController extends Controller {

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
