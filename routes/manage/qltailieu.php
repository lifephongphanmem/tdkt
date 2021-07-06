<?php
//Quản lý quyết định
Route::resource('qlquyetdinhkt','manage\qltailieu\quyetdinh\QuyetDinhController');
Route::get('/qlquyetdinh/lydo','manage\vbpl\hoidap\HoidapController@lydo');
Route::post('qlquyetdinh/delete','manage\vbpl\hoidap\HoidapController@delete');
Route::post('qlquyetdinh/trans','manage\vbpl\hoidap\HoidapController@trans');
Route::get('checkmahoidap','manage\vbpl\hoidap\HoidapController@checkkihieu');

//Quản lý tờ trình
Route::resource('qltotrinhkt','manage\qltailieu\totrinh\ToTrinhController');
Route::post('qlquyetdinh/get','manage\vbpl\hoidap\HoidapController@get');
Route::post('qlquyetdinh/back','manage\vbpl\hoidap\HoidapController@back');
Route::get('qlquyetdinh/{id}/traloi','manage\vbpl\hoidap\HoidapController@traloi');
Route::PATCH('qlquyetdinh/{id}/anser','manage\vbpl\hoidap\HoidapController@anser');

//Quản lý biên bản
Route::resource('qlbienban','manage\qltailieu\bienban\BienBanController');
Route::post('laphosotd/delete','manage\ktcaccap\LapHoSoTdController@delete');
Route::get('checkkihieu','manage\ktcaccap\LapHoSoTdController@checkkihieu');

//phong trào thi đua
Route::resource('qlphontraotd','manage\qltailieu\phongtrao\PhongTraoController');

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