<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AngularController extends Controller
{
    //
    function issues(){    	
    	return view('issues.list');    	
    }
}
