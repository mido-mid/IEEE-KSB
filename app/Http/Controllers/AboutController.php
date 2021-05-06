<?php

namespace App\Http\Controllers;

use App\Committee;
use App\Volunteer;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index()
	{
        $highboard = Committee::where('name','high_board')->first();

        if($highboard) {
            $volunteers = $highboard->volunteers;
        }
        else{
            $volunteers = [];
        }
		return view('about',compact('volunteers'));
	}
}
