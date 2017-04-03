<?php

namespace App\Http\Controllers;

use App\Model\Member;
use App\Model\Ticked;
use App\Model\Tracker;
use App\Model\Status;
use App\Http\Requests\IssuesRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\TickedRepository as TickedRep;

class IssuesController extends Controller
{
    protected $redirectTo = '/Login';

    public function __construct(TickedRep $tickedRep)
    {
        $this->middleware('admin');
        $this->TickedRep = $tickedRep;
    }
    
    // public function __construct()
    // {
    //     $this->middleware('guest', ['except' => 'logout']);
    // }

    function show(){
        $title='Issues';
        //dd('ahihi');
        //$tickeds=Ticked::all();
        $test=$this->TickedRep->all();

        //define('TESTNAME', 'NhuanBua');
        //$testVar ="ba4567";
        //$var2="var2";
        //define('TESTNAME', 'Bua');
     // dd($hello.$hello2);
        //$cars=array("Volvo","BMW","Toyota");

        //print "pr1</br>";
        // printf("%1.2f", 512);
        // printf("%10.2f", 512);
       // print_r($cars);
        // echo "My car is a $cars[1] </br>";
        // print "My car is a {$cars[0]}".'bebe'."alonxo";
        //dd($testVar);
        $tickeds=DB::table('tickeds')
            ->leftJoin('Trackers','tickeds.trackerNo','=','Trackers.trackerNo')
            ->select('*','Trackers.name as trackerName')->paginate(5);
    	return view('issues.list',compact('title','tickeds'));
    }

    function editShow(){
        //$member=Member::all();
        $member=DB::table('members')
            ->select('memberNo','name')->get();
        //$getSelectValue = Member::get('$member');
        $title='New Issues';
        $trackers=[''=>'']+Tracker::pluck('name','trackerNo')->all();
        //dd($trackers);
        $status=[''=>'']+Status::pluck('name','statusNo')->all();
        if(Cache::has('cacheStatus')){
            $status = Cache::get('cacheStatus');
            Log::debug('Lay du lieu tu cache');
        }
        else{
            $status =[''=>'']+Status::pluck('name','statusNo')->all();
            Cache::put('cacheStatus',$status,5);
            Log::debug('Lan dau luu cache');
        }
        $assignes=[''=>'']+Member::pluck('name','memberNo')->all();
    	return view('Issues.edit',
            compact('member','title','trackers','status','assignes'));
    }

    function showTicked($tickedNo){
        /*$ticked = Ticked::join('TypeProperties','tickeds.typeNo','=','TypeProperties.typeNo')
            ->where('tickedNo','=',$tickedNo)
            ->where('TypeProperties.type','=','BUG')
            ->first();*/
        //dd($ticked);    

        $ticked=DB::table('tickeds')
            ->leftJoin('Trackers','tickeds.trackerNo','=','Trackers.trackerNo')
            ->leftJoin('statuses','tickeds.statusNo','=','statuses.statusNo')
            ->select('*','Trackers.name as trackerName')->where('tickedNo','=',$tickedNo)->first();
        //dd($ticked);
        
        $title=$ticked->trackerName.' #'.$ticked->tickedNo;
        return view('Issues.show',compact('ticked','title'));
    }

    function createIssues(IssuesRequest $request){
        //dd($request->tracker.$request->status);
        $ticked=new Ticked();
        $ticked->trackerNo=$request->tracker;
        $ticked->subject=$request->subject;
        $ticked->statusNo=$request->status;
        $ticked->priority=$request->priority;
        $ticked->assigneMemberNo=$request->assignesMember;
        //dd(Auth::guard('member')->user()->memberNo)        ;
        $ticked->author=Auth::guard('member')->user()->memberNo;
        //$request->assignesMember;
        $ticked->startDate=$request->startdate;
        $ticked->dueDate=$request->duedate;
        $ticked->descript=$request->descript;
        $ticked->save();
        //return view('Issues.edit');
        //dd($ticked->id);
        $title='Home';
        session()->flash('message_info', 'Ticked create success !');
        return redirect()->intended('/Issues/'.$ticked->id);
    }
}
