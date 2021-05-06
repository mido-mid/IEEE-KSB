<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;

use App\Volunteer;

class VolunteerController extends Controller
{
    //
    use GeneralTrait;

    public function index()
	{

		$volunteers = Volunteer::orderBy('id', 'desc')->get();
		return $this->returnData(['volunteers'],[$volunteers]);
	}

}
