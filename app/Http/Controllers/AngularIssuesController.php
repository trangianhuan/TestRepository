<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AngularIssuesController extends Controller
{
    //
    function show(){
        $title='Issues';
        //dd('ahihi');
        //$tickeds=Ticked::all();
        //$test=$this->TickedRep->all();

        $tickeds=DB::table('tickeds')
            ->leftJoin('Trackers','tickeds.trackerNo','=','Trackers.trackerNo')
            ->select('*','Trackers.name as trackerName')->paginate(3);
            //paginate(5);
    	return compact('title','tickeds');
    }
}
