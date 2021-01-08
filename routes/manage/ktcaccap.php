<?php
//dangkytd
Route::get('/dangkytd/lydo','manage\ktcaccap\DangKyTdController@lydo');
Route::resource('dangkytd','manage\ktcaccap\DangKyTdController');
Route::post('dangkytd/delete','manage\ktcaccap\DangKyTdController@delete');
Route::post('dangkytd/trans','manage\ktcaccap\DangKyTdController@trans');
Route::get('checkkihieu','manage\ktcaccap\DangKyTdController@checkkihieu');

//duyetdktd
Route::get('/duyetdktd/lydo','manage\ktcaccap\DangKyTdXdController@lydo');
Route::post('duyetdktd/get','manage\ktcaccap\DangKyTdXdController@get');
Route::post('duyetdktd/back','manage\ktcaccap\DangKyTdXdController@back');
Route::resource('duyetdktd','manage\ktcaccap\DangKyTdXdController');

//laphosotd
Route::resource('laphosotd','manage\ktcaccap\LapHoSoTdController');
Route::post('laphosotd/delete','manage\ktcaccap\LapHoSoTdController@delete');
Route::get('checkkihieu','manage\ktcaccap\LapHoSoTdController@checkkihieu');

//trinhhoso
Route::get('/trinhhoso/lydo','manage\ktcaccap\TrinhHoSoController@lydo');
Route::resource('trinhhoso','manage\ktcaccap\TrinhHoSoController');
Route::post('trinhhoso/delete','manage\ktcaccap\TrinhHoSoController@delete');
Route::post('trinhhoso/trans','manage\ktcaccap\TrinhHoSoController@trans');

//duyethoso
Route::get('/duyethoso/lydo','manage\ktcaccap\DuyetHoSoController@lydo');
Route::resource('duyethoso','manage\ktcaccap\DuyetHoSoController');
Route::post('duyethoso/get','manage\ktcaccap\DuyetHoSoController@get');
Route::post('duyethoso/back','manage\ktcaccap\DuyetHoSoController@back');

//chuyenhosocaptren
Route::get('/chuyenhosocaptren/lydo','manage\ktcaccap\ChuyenHoSoCapTrenController@lydo');
Route::resource('chuyenhosocaptren','manage\ktcaccap\ChuyenHoSoCapTrenController');
Route::post('chuyenhosocaptren/back','manage\ktcaccap\ChuyenHoSoCapTrenController@back');
Route::post('chuyenhosocaptren/trans','manage\ktcaccap\ChuyenHoSoCapTrenController@trans');