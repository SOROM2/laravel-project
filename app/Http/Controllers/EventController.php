<?php

namespace App\Http\Controllers;
use App\Workout;

use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Http\Request;


class EventController extends Controller
{
    //
    
    public function calendar()
    {
        $events = [];
        $data = Workout::where('user_id',auth()->id())->get();

        if ($data->count())
        {
            foreach ($data as $key=>$value)
            {
             switch ($value->type )
{
case "walk":
 $color="#5cb85c";
 break;
case "volleyball":
case "cycle":
 $color="#5bc0de";
 break;
 case "hunt":
 case "surf - mermaids":
 case "surf - warrington":
 case "surf - ocean view":
 case "surf - canoe beach":
 $color="#f0ad4e";
 break;
case "yoga":
$color="#d9534f";
break;
case "run":
$color="#0275d8";
break;
case "swim":
$color="#d9b3ff";
break;
default;
 $color="#c68c53";
}   
		
                $events[] = Calendar::event(
                    $value->type,
                    true,
                    new \DateTime($value->date),
                    new \DateTime($value->date),
                    null,
                    [
                        'color'=>$color,
                        'textColor'=>'white',
                    ]
                    );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('calendar', compact('calendar'));
    }
}
