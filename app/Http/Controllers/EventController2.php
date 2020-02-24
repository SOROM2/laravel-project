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
               
                switch ($value->type)
{
case "cycle":
 $color="green";
 break;
case "walk":
 $color="blue";
 break;
case "swim":
 $color="red";
 break;
 case "yoga":
 $color="yellow";
 break;
 case (preg_match('/surf.*/', $value->type)):
 $color="purple";
 break;
default;
 $color="yellow";
}

                $events[] = Calendar::event(
                    $value->type,
                    true,
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