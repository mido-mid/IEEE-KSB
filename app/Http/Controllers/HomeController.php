<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Volunteer;
use App\Article;
use App\Committee;
use App\Role;

class HomeController extends Controller
{

	public function index()
	{

		$articles = Article::orderBy('id', 'desc')->limit(3)->get();
		$volunteers = Volunteer::orderBy('id', 'desc')->limit(3)->get();
		return view('home',compact('articles','volunteers'));
	}
}
