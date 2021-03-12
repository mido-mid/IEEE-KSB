<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {

        $year = "";
        $events = Event::orderBy('id', 'desc')->paginate(9);
        return view('article',compact('articles','year'));
    }

    public function filter(Request $request)
    {
        if($request->article_date > 0)
        {
            $year = $request->article_date;
            $articles = Article::orderBy('id', 'desc')->whereYear('date',$request->article_date)->paginate(9);
        }
        else
        {
            $year = "";
            $articles = Article::orderBy('id', 'desc')->paginate(9);
        }
        return view('article',compact('articles','year'));
    }
}
