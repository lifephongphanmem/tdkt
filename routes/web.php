<?php
Route::get('','HomeController@index');
Route::get('thongtinhotro',function(){
    return view('thongtinhotro')
        ->with('pageTitle','Thông tin hỗ trợ');
});
//System
include('system/system.php');
//End System

//Manage

//End Manage

//View

//End view


