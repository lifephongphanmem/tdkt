<?php
//dangkytd
Route::get('/qlquyetdinh/lydo','manage\vbpl\hoidap\HoidapController@lydo');
Route::resource('qlquyetdinh','manage\vbpl\hoidap\HoidapController');
Route::post('qlquyetdinh/delete','manage\vbpl\hoidap\HoidapController@delete');
Route::post('qlquyetdinh/trans','manage\vbpl\hoidap\HoidapController@trans');
Route::get('checkmahoidap','manage\vbpl\hoidap\HoidapController@checkkihieu');

//duyetdktd
Route::post('qlquyetdinh/get','manage\vbpl\hoidap\HoidapController@get');
Route::post('qlquyetdinh/back','manage\vbpl\hoidap\HoidapController@back');
Route::get('qlquyetdinh/{id}/traloi','manage\vbpl\hoidap\HoidapController@traloi');
Route::PATCH('qlquyetdinh/{id}/anser','manage\vbpl\hoidap\HoidapController@anser');

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

//duyethosocapduoi
Route::get('/duyethosocapduoi/lydo','manage\ktcaccap\DuyetHoSoCapDuoiController@lydo');
Route::resource('duyethosocapduoi','manage\ktcaccap\DuyetHoSoCapDuoiController');
Route::post('duyethosocapduoi/get','manage\ktcaccap\DuyetHoSoCapDuoiController@get');
Route::post('duyethosocapduoi/back','manage\ktcaccap\DuyetHoSoCapDuoiController@back');