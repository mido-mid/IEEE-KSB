<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;

use App\Volunteer;
use App\Article;
use App\Committee;
use App\User;
use App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $volunteers = Volunteer::orderBy('id','desc')->limit(5)->get();
        $committees = Committee::orderBy('id','desc')->limit(5)->get();
        $admins = User::where('admin', 0)->orderBy('id', 'desc')->limit(5)->get();
        $articles = Article::orderBy('id','desc')->limit(5)->get();
        $events = Event::orderBy('id','desc')->limit(5)->get();

        return view('admin.dashboard',compact('volunteers', 'committees', 'admins', 'articles','events'));
    }
}
