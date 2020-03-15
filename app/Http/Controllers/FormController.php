<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Drink;
use App\Mood;
use App\Sleep;
use App\Snack;
use App\User;
use App\Weight;
use App\Workout;
use DB;

class FormController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
//store a users workout
    public function store(Request $request)
    {
        $formData=request()->all();
        if(isset($formData['workout']))
{
        $workout = new Workout();
	    $workout->date=$request->get('date');
        $workout->type=$request->get('type');
        $workout->minutes=$request->get('minutes');
        $workout->kilometres=$request->get('kilometres');
        //the user id is the current users id
        $workout->user_id=auth()->id();
        $workout->save();

        return redirect('home')->with('success','Your workout has been recorded');
}
//store a users drinks
    if(isset($formData['drink']))
    {
        $rules = [
            'date'=>'required',
            'number'=>'required|integer|min:1',
            'kilojoules'=>'required|integer|min:1',
            'calories'=>'required|integer|min:1'
           ];
           $messages = [
               'number.min' => 'please enter a number above 1',
               'kilojoules.min' => 'please enter a number above 1',
               'calories.min' => 'please enter a number above 1'
           ];
        $drink = new Drink();
	    $drink->date=$request->get('date');
        $drink->type=$request->get('type');
        $drink->number=$request->get('number');
       
        //convert Kcal to Kj. multiply by 4.184
        //convert Kj to Kcal. divide by 4.184
        if("" == trim($_POST['kilojoules']))
        {
            $dConvert=$request->get('calories')*4.184;
            $drink->kilojoules= $dConvert;
        }
            else
            {
                $drink->kilojoules=$request->get('kilojoules');
            }
            if("" == trim($_POST['calories']))
            {
                $ddConvert=$request->get('kilojoules')/4.184;
                $drink->calories= $ddConvert;
            }
                else
                {
                    $drink->calories=$request->get('calories');
                }

        //the user id is the current users id
        $drink->user_id=auth()->id();
        $drink->save();

        return redirect('home')->with('success','drink has been recorded');
    }

//store a users snacks
if(isset($formData['snack']))
    {
        $rules = [
            'date'=>'required',
            'type'=>'required'
        ];
        $messages = [
            'date.required'=>'Please enter a date',
            'type.required'=>'Please enter a type of Snack'
        ];
        $request->validate($rules, $messages);
        $snack = new Snack();
	    $snack ->date=$request->get('date');
        $snack ->type=$request->get('type');
         //convert Kcal to Kj. multiply by 4.184
        //convert Kj to Kcal. divide by 4.184
        if("" == trim($_POST['kilojoules']))
        {
            $dConvert=$request->get('calories')*4.184;
            $snack->kilojoules= $dConvert;
        }
            else
            {
                $snack->kilojoules=$request->get('kilojoules');
            }
            if("" == trim($_POST['calories']))
            {
                $ddConvert=$request->get('kilojoules')/4.184;
                $snack->calories= $ddConvert;
            }
                else
                {
                    $snack->calories=$request->get('calories');
                }
        //the user id is the current users id
        $snack ->user_id=auth()->id();
        $snack ->save();

        return redirect('home')->with('success','Your Snack has been recorded');
    }
//store a users sleep
if(isset($formData['sleep']))
    {
        $rules = [
            'date'=>'required',
            'hours'=>'required|integer|min:0'
        ];
        $messages = [
            'date.required'=>'Please enter a date',
            'hours.min'=>'Please enter a number greater than or equal to 0'
        ];

        $request->validate($rules, $messages);
        $sleep = new Sleep();
	    $sleep ->date=$request->get('date');
        $sleep ->hours=$request->get('hours');
        //the owner id is the current users id
        $sleep ->user_id=auth()->id();
        $sleep ->save();
        return redirect('home')->with('success','Your sleep has been recorded');
    }
//store a users mood
if(isset($formData['mood']))
    {
        $rules = [
         'date'=>'required',
         'level'=>'required|integer|between:1,10'
        ];
        $messages = [
            'level.between' => 'please enter a number between 1 & 10',
            'date.required' => 'date is required'
        ];
        $request->validate($rules,$messages);
        $mood = new Mood();
	    $mood ->date=$request->get('date');
        $mood ->level=$request->get('level');
        //the user id is the current users id
        $mood ->user_id=auth()->id();
        $mood ->save();

        return redirect('home')->with('success','Your mood has been recorded');
    }
//store a users weight
if(isset($formData['weight']))
    {
<<<<<<< HEAD
        $rules = [
            'date'=>'required',
            'Kilograms'=>'required'
        ];
        $messages = [
            'date.required'=>'Please enter a date',
            'Kilograms.required'=>'Please enter a weight'
        ];
                $request->validate($rules,$messages);
=======
        
>>>>>>> d62b3cd4e41feed2824b9c5f0de615ecd04d4ea5
        $weight = new Weight();
	    $weight ->date=$request->get('date');
        $weight ->Kilograms =$request->get('Kilograms');
        //the user id is the current users id
        $weight ->user_id=auth()->id();
        $weight ->save();

        return redirect('home')->with('success','Your weight has been recorded');
    }

    //Ask the coach options

    //check last recorded mood by date
    if(isset($formData['coachMood']))
    {
        $moods = Mood::where('user_id',auth()->id())->orderBy('date','desc')->first();
        $lastLevel=$moods->level;
       
        if($lastLevel > 6)
{
        return redirect('home')->with('success',' Your last mood reading was '.$lastLevel.'. Your mood is up right now, whatever you are doing, its working! Keep up the good work!');
}
        else
        {
            return redirect('home')->with('warning',' Your last mood reading was '.$lastLevel.'. If you feel your mood isnt great, check that you are getting enough exercise and sleep.');
        }
    }

    //check last recorded sleep by date
    if(isset($formData['coachSleep']))
    {
        $sleeps = Sleep::where('user_id',auth()->id())->orderBy('date','desc')->first();
        $lastHours=$sleeps->hours;
        
        if($lastHours > 6)
{
        return redirect('home')->with('success',' Your last sleep reading was '.$lastHours.' hours. Thats awesome. The recommended sleep amount is at least 7 hours a night.');
}
        else
        {
            return redirect('home')->with('warning',' Your last sleep reading was '.$lastHours.' hours. If you are finding it hard to get enough sleep, check your caffeine and alcohol intake. Try limiting your evening screen time too.');
        }
    }

    //checks last workout duration
    if(isset($formData['coachWorkout']))
    {
        $workouts = Workout::where('user_id',auth()->id())->orderBy('date','desc')->first();
        $lastWorkout=$workouts->minutes;
        
        if($lastWorkout > 29)
{
        return redirect('home')->with('success',' Your last workout was '.$lastWorkout.' minutes. Thats awesome. The recommended daily exercise amount is at least 30 minutes a day.');
}
        else
        {
            return redirect('home')->with('warning',' Your last workout was '.$lastWorkout.' minutes. Its recommened to do at least 30 minutes exercise a day. Even small things like taking the stairs, or going for short walks all add up.');
        }
    }

    //checks last week of avg kilojoules recorded
    if(isset($formData['coachSnack']))
    {
        $date = \Carbon\Carbon::today()->subDays(7);
        $snacks = Snack::where('user_id',auth()->id())->where('date', '>=', $date)->get();
        $lastsSnacks=$snacks->avg('kilojoules');
	 $lastSnacks=number_format((float)$lastsSnacks, 0, '', '');
        
        if($lastSnacks < 1500)
{
        return redirect('home')->with('success',' In the last 7 days when you have been snacking  you averaged '.$lastSnacks.' kilojoules. Thats awesome. Keep up the great work. You have amazing self discipline!');
}
        else
        {
            return redirect('home')->with('warning',' In the last 7 days when you have been snacking averaged '.$lastSnacks.' kilojoules. Thats a bit high. The Daily total recommended kilojoules is 8700. Try substituting some snacks for lower calorie options, or fill up with water.');
        }
    }
    //checks last weeks number of std drinks recorded
    if(isset($formData['coachDrink']))
    {
        $date = \Carbon\Carbon::today()->subDays(7);
        $drinks = Drink::where('user_id',auth()->id())->where('date', '>=', $date)->get();
        $lastDrink=$drinks->sum('number');
        
        if($lastDrink < 8)
{
        return redirect('home')->with('success',' In the last 7 days you have had ' .$lastDrink.' drinks. Thats good. Remember the weekly guidelines are no more than 8 standard drinks for women, and 15 for men.');
}
        else
        {
            return redirect('home')->with('warning',' In the last 7 days you have had '.$lastDrink.' drinks. Remember the weekly guidelines are no more than 8 standard drinks for women, and 15 for men. You could try alternating your drinks and make every second one a glass of water.');
        }
    }
  
}
//CHARTS
public function homelist()
{
            //HOME PAGE CHARTS (GAUGES)

        //select workouts duration by date, for other user
       $userID = auth()->id();
    
        $workoutData = DB::table('workouts')
        ->select(
            
            DB::raw('avg(minutes) as minutes'))
            ->where('user_id', '<>', $userID)
            ->groupBy('user_id')
            ->get();
            $workoutArray[] = ['minutes'];
            foreach($workoutData as $key => $value)
            {
                $workoutArray[++$key] = [(int)$value->minutes];
            }

        //select workouts duration by date, for logged in user
       
        $myWorkoutData = DB::table('workouts')
        ->select(
           
            DB::raw('avg(minutes) as myMinutes'))
            ->where('user_id',auth()->id())
            ->groupBy('user_id')
            ->get();
            $myWorkoutArray[] = ['myMinutes'];
            foreach($myWorkoutData as $key => $value)
            {
                $myWorkoutArray[++$key] = [(int)$value->myMinutes];
            }
            
        //select sleep duration by date, for logged in user
       
        $mySleepData = DB::table('sleeps')
        ->select(
            
            DB::raw('avg(hours) as hours'))
            ->where('user_id',auth()->id())
            ->groupBy('user_id','date')
            ->orderBy('date', 'desc')
            ->get();
            //dd($mySleepData);
            $mySleepArray[] = ['hours'];
            foreach($mySleepData as $key => $value)
            {
                $mySleepArray[++$key] = [(int)$value->hours];
            }

    return view('home')->with('minutes',json_encode($workoutArray))->with('myMinutes',json_encode($myWorkoutArray))->with('hours',json_encode($mySleepArray));
}

        //CHARTS PAGE

    public function chart()
    {
        //select workouts, count(*) for a user group by workout
        $data = DB::table('workouts')
        ->select(
            DB::raw('type as type'),
            DB::raw('count(*) as number'))
            ->where('user_id',auth()->id())
            ->groupBy('type')
            ->get();
            $array[] = ['type','number'];
            foreach($data as $key => $value)
            {
                $array[++$key] = [$value->type, $value->number];

            }
        //select workouts duration by date, for logged in user
       
        $workoutData = DB::table('workouts')
            ->select(
                DB::raw('date as date'),
                DB::raw('SUM(minutes) as minutes'))
                ->where('user_id',auth()->id())
                ->orderBy('date')
                ->groupBy(DB::raw('date'))
                ->get();
                //dd($workoutData);
                $workoutArray[] = ['date','minutes'];
                foreach($workoutData as $key => $value)
                {
                    $workoutArray[++$key] = [$value->date, (int)$value->minutes];
                
                }
            //select mood data, for logged in user
       
            $moodData = DB::table('moods')
        ->select(
            DB::raw(' level as level'),
            DB::raw('date as date'))
            ->where('user_id',auth()->id())
            ->orderBy('date')
            ->get();
            $Moodarray[] = ['date','level'];
            foreach($moodData as $key => $value)
            {
                $Moodarray[++$key] = [$value->date, $value->level];

            }

             //select sleep data, for logged in user
       
             $sleepData = DB::table('sleeps')
             ->select(
                 DB::raw(' hours as hours'),
                 DB::raw('date as date'))
                 ->where('user_id',auth()->id())
                 ->orderBy('date')
                 ->get();
                 $sleepArray[] = ['date','hours'];
                 foreach($sleepData as $key => $value)
                 {
                     $sleepArray[++$key] = [$value->date, $value->hours];
     
                 }
            //select weight data, for logged in user
       
            $weightData = DB::table('weights')
        ->select(
            DB::raw('Kilograms as kilograms'),
            DB::raw('date as date'))
            ->where('user_id',auth()->id())
            ->orderBy('date')
            ->get();
            $weightArray[] = ['date','kilograms'];
            foreach($weightData as $key => $value)
            {
                $weightArray[++$key] = [$value->date, $value->kilograms];

            }
                  //select snack data, for logged in user
       
            $snackData = DB::table('snacks')
            ->select(
                DB::raw('date as date'),
                DB::raw('SUM(kilojoules) as kilojoules'))
                ->where('user_id',auth()->id())
                ->orderBy('date')
                ->groupBy('date')
                ->get();
                $snackArray[] = ['date','kilojoules'];
                foreach($snackData as $key => $value)
                {
                    $snackArray[++$key] = [$value->date, (int)$value->kilojoules];
    
                }

                 //select drinks data, for logged in user
       
            $drinkData = DB::table('drinks')
            ->select(
                DB::raw('number as number'),
                DB::raw('date as date'))
                ->where('user_id',auth()->id())
                ->orderBy('date')
                ->get();
                $drinkArray[] = ['date','number'];
                foreach($drinkData as $key => $value)
                {
                    $drinkArray[++$key] = [$value->date, $value->number];
    
                }
        return view('graphs')->with('type',json_encode($array))->with('kilograms',json_encode($weightArray))->with('level', json_encode($Moodarray))->with('hours', json_encode($sleepArray))->with('minutes', json_encode($workoutArray))->with('kilojoules', json_encode($snackArray))->with('number', json_encode($drinkArray));
    }
    //output for tables
    public function list()
        {
            $moods = Mood::where('user_id',auth()->id())->orderBy('date','desc')->get();
	    $sleeps = Sleep::where('user_id',auth()->id())->orderBy('date','desc')->get();
            $workouts = Workout::where('user_id',auth()->id())->orderBy('date','desc')->get();
            $snacks = Snack::where('user_id',auth()->id())->orderBy('date','desc')->get();
            $drinks = Drink::where('user_id',auth()->id())->orderBy('date','desc')->get();
            $weights = Weight::where('user_id',auth()->id())->orderBy('date','desc')->get();


//$weekWorkout= select(YEARWEEK(date) as yyyyww, SUM(minutes)
//from workouts
//->groupBy('yyyyww')
//->orderBy('yyyyww')
//->get();           

//dd($weekWorkout);
//$weekWorkout = Workout::select('*')
//            ->get()
 //           ->where('user_id',auth()->id())
  //          ->groupBy(function($date) {
     //           return \Carbon\Carbon::parse($date->date)->format('W');
      //      });
            //dd($weekWorkout);
		//	foreach($weekWorkout as $week)
			//dd($week);
            //current users name
            $user=auth()->user();
            
            //personal bests and lifetime stats
            $totalDuration=$user->workouts()->sum('minutes');
            $totalDistance=$user->workouts()->sum('kilometres');
            $maxDuration=$user->workouts()->max('minutes');
            $maxDistance=$user->workouts()->max('kilometres');
			
			//summaries
			// Last 7 day totals
			$date = \Carbon\Carbon::today()->subDays(7);
            $sdrinks = Drink::where('user_id',auth()->id())->where('date', '>=', $date)->get();
            $totalDrinks=$sdrinks->sum('number');
			
			$date = \Carbon\Carbon::today()->subDays(30);
            $sdrinks = Drink::where('user_id',auth()->id())->where('date', '>=', $date)->get();
            $ZDrinks=$sdrinks->sum('number');
		   
			
			$date = \Carbon\Carbon::today()->subDays(7);
            $ssleep = Sleep::where('user_id',auth()->id())->where('date', '>=', $date)->get();
            $totalSleep=$ssleep->sum('hours');
		   
		   			$date = \Carbon\Carbon::today()->subDays(30);
            $ssleep = Sleep::where('user_id',auth()->id())->where('date', '>=', $date)->get();
            $ZSleep=$ssleep->sum('hours');
			
			$date = \Carbon\Carbon::today()->subDays(7);
            $ssnack = Snack::where('user_id',auth()->id())->where('date', '>=', $date)->get();
            $totalKilojoules=$ssnack->sum('kilojoules');
		   
		   	$date = \Carbon\Carbon::today()->subDays(30);
            $ssnack = Snack::where('user_id',auth()->id())->where('date', '>=', $date)->get();
            $ZKilojoules=$ssnack->sum('kilojoules');

			$date = \Carbon\Carbon::today()->subDays(7);
            $smins = Workout::where('user_id',auth()->id())->where('date', '>=', $date)->get();
            $tDuration=$smins->sum('minutes');
			
			$date = \Carbon\Carbon::today()->subDays(30);
            $smins = Workout::where('user_id',auth()->id())->where('date', '>=', $date)->get();
            $ZDuration=$smins->sum('minutes');
		    

			$date = \Carbon\Carbon::today()->subDays(7);
            $skm = Workout::where('user_id',auth()->id())->where('date', '>=', $date)->get();
            $tDistance=$skm->sum('kilometres');
			
						$date = \Carbon\Carbon::today()->subDays(30);
            $skm = Workout::where('user_id',auth()->id())->where('date', '>=', $date)->get();
            $ZDistance=$skm->sum('kilometres');
		    
			
            return view('tables', compact('moods','tDistance','ZDistance','sleeps','workouts','snacks','drinks','weights','user','maxDuration','maxDistance','totalDuration','totalDistance','totalSleep','ZSleep','tDuration','ZDuration','totalKilojoules','ZKilojoules','totalDrinks','ZDrinks'));
        }
    
}
