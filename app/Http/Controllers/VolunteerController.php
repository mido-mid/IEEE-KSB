<?php

namespace App\Http\Controllers;

use App\Committee;
use Illuminate\Http\Request;

use App\Volunteer;

class VolunteerController extends Controller
{
    //

    public function index()
	{

		$volunteers = Volunteer::orderBy('id', 'desc')->paginate(9);
        $committees = Committee::all();
		return view('volunteer',compact('volunteers','committees'));
	}

    public function filter(Request $request)
    {
        $committees = Committee::all();
        if($request->committee > 0)
        {
            $committee = $request->committee;
            $volunteers = Volunteer::orderBy('id', 'desc')->where('committee_id',$committee)->paginate(9);
        }
        else
        {
            $volunteers = Volunteer::orderBy('id', 'desc')->paginate(9);
        }
        return view('volunteer',compact('volunteers','committees'));
    }

}
