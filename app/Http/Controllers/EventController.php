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
        return view('event',compact('events','year'));
    }

    public function filter(Request $request)
    {
        if($request->event_date > 0)
        {
            $year = $request->event_date;
            $events = Event::orderBy('id', 'desc')->whereYear('start_date',$request->event_date)->paginate(9);
        }
        else
        {
            $year = "";
            $events = Event::orderBy('id', 'desc')->paginate(9);
        }
        return view('event',compact('events','year'));
    }
}
