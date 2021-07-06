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
include('manage/ktcaccap.php');
include('manage/qltailieu.php');
include('manage/hiepy.php');
include('manage/quytdkt.php');
include('manage/vbpl.php');
//End Manage

//View
include('reports/Baocaoth.php');

//End view



