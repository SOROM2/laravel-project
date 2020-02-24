<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Player;
use DB;
class PageController extends Controller
{
    //
    public function home()
    {
     
    }
    public function chart()
    {
        //select role, count(*) from players group by role
        $data = DB::table('players')
        ->select(
            DB::raw('role as role'),
            DB::raw('count(*) as number'))
            ->groupBy('role')
            ->get();
            $array[] = ['role','number'];
            foreach($data as $key => $value)
            {
                $array[++$key] = [$value->role, $value->number];

            }
            //select bowling, count(*) from players group by bowling
       
            $dataBowling = DB::table('players')
        ->select(
            DB::raw('bowling as bowling'),
            DB::raw('count(*) as number'))
            ->groupBy('bowling')
            ->get();
            $Bowlarray[] = ['bowling','number'];
            foreach($dataBowling as $key => $value)
            {
                $Bowlarray[++$key] = [$value->bowling, $value->number];

            }
        return view('googleCharts')->with('role',json_encode($array))->with('bowling', json_encode($Bowlarray));
    }
}
