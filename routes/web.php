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
include('manage/kttkkc.php');
include('manage/hiepy.php');
//End Manage

//View

//End view



