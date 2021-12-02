<?php
//Quản lý hỏi đáp
Route::resource('qlhoidap','manage\vbpl\hoidap\HoidapController');
Route::get('/qlhoidap/lydo','manage\vbpl\hoidap\HoidapController@lydo');
Route::post('qlhoidap/delete','manage\vbpl\hoidap\HoidapController@delete');
Route::post('qlhoidap/trans','manage\vbpl\hoidap\HoidapController@trans');
Route::get('checkmahoidap','manage\vbpl\hoidap\HoidapController@checkkihieu');
