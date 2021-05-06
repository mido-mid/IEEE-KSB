<?php

namespace App\Http\Controllers\Api;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;


use App\Volunteer;
use App\Article;
use App\Committee;
use App\Role;

class HomeController extends Controller
{

    use GeneralTrait;

	public function index()
	{
		$articles = Article::orderBy('id', 'desc')->limit(3)->get();
		$volunteers = Volunteer::orderBy('id', 'desc')->limit(3)->get();
        $events = Event::orderBy('id', 'desc')->limit(3)->get();
		return $this->returnData(['events','articles','volunteers'],[$events,$articles,$volunteers]);
	}
}
