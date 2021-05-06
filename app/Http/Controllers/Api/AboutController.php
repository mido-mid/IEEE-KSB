<?php

namespace App\Http\Controllers\Api;

use App\Committee;
use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Volunteer;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    use GeneralTrait;
    public function index()
	{
        $highboard = Committee::where('name','high_board')->first();

        if($highboard) {
            $volunteers = $highboard->volunteers;
        }
        else{
            $volunteers = [];
        }
        return $this->returnData(['highboard'],[$volunteers]);
	}
}
