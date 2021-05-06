<?php

namespace App\Http\Controllers\Api;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;

class EventController extends Controller
{

    use GeneralTrait;

    public function index()
    {

        $year = "";
        $events = Event::orderBy('id', 'desc')->get();
        return $this->returnData(['events'],[$events]);
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
         return $this->returnData(['events'],[$events]);
    }
}
