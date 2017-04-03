<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/',['middleware'=>'admin','uses'=>'HomeController@index']);
Route::get('/Overview',['uses' =>'HomeController@index','as'=>'Overview']);
Route::get('/NewIssues',['uses' =>'IssuesController@editShow','as'=>'NewIssues']);
Route::get('/Issues',['uses' =>'IssuesController@show','as'=>'Issues']);
Route::get('/Issues/{tickedNo}',['uses' =>'IssuesController@showTicked','as'=>'IssuesDetail']);
Route::post('/Issues/create',['uses' =>'IssuesController@createIssues','as'=>'CreateIssues']);
Route::get('/Login',['uses' =>'LoginController@show','as'=>'Login']);
Route::post('/Login',['uses' =>'LoginController@checkLogin','as'=>'checkLogin']);
Route::get('/logout',['uses' =>'LoginController@logout','as'=>'logout']);
Route::get('/Issues',['uses' =>'AngularController@issues','as'=>'Issues']);
Route::get('/IssuesAngular',['uses' =>'AngularIssuesController@show','as'=>'IssuesAngular']);