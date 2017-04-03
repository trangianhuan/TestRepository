<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    //
    function show(){    	
    	return view('login.show');
    }

    function logout(){
        Auth::guard('member')->logout();
        return redirect('Login');//->intended('Login');
    }

    function checkLogin(Request $request){
    	
    	$userData=['memberNo' =>$request->userId,'password' => $request->password];
        if(Auth::guard('member')
            ->attempt($userData)){
    	//if(Auth::attempt($userData))
    		//dd(bcrypt($request->password));
            //dd(Auth::guard('member')->check());
            return redirect('/');//->intended('/');
        }
    	else
    		//dd( $request->password.' faild');
    	   return view('login.show');
    }
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    // protected $projects;

    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         $this->projects = Auth::guard('member')->user();

    //         return $next($request);
    //     });
    // }
    
}
