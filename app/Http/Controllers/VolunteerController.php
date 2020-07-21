<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Volunteer;

class VolunteerController extends Controller
{
    //

    public function index()
	{

		$volunteers = Volunteer::orderBy('id', 'desc')->paginate(9);
		return view('volunteer',compact('volunteers'));
	}

}
