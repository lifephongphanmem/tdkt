<?php
//dangkytd
Route::get('dangkytddf/themdoituong','manage\ktcaccap\DangKyTddfController@themdoituong');
Route::get('dangkytddf/delete','manage\ktcaccap\DangKyTddfController@delete');
Route::get('dangkytddf/suadoituong','manage\ktcaccap\DangKyTddfController@suadoituong');
Route::get('dangkytddf/update','manage\ktcaccap\DangKyTddfController@updatedt');

Route::get('dangkytdct/boxungdt','manage\ktcaccap\DangKyTdctController@boxungdt');
Route::get('dangkytdct/delete','manage\ktcaccap\DangKyTdctController@delete');
Route::get('dangkytdct/chinhsuadt','manage\ktcaccap\DangKyTdctController@chinhsuadt');
Route::get('dangkytdct/update','manage\ktcaccap\DangKyTdctController@updatedt');

Route::get('/dangkytd/lydo','manage\ktcaccap\DangKyTdController@lydo');
Route::resource('dangkytd','manage\ktcaccap\DangKyTdController');
Route::post('dangkytd/delete','manage\ktcaccap\DangKyTdController@delete');
Route::post('dangkytd/trans','manage\ktcaccap\DangKyTdController@trans');
Route::get('checkmatd','manage\ktcaccap\DangKyTdController@checkkihieu');


//duyetdktd
Route::get('/duyetdktd/lydo','manage\ktcaccap\DangKyTdXdController@lydo');
Route::post('duyetdktd/get','manage\ktcaccap\DangKyTdXdController@get');
Route::post('duyetdktd/back','manage\ktcaccap\DangKyTdXdController@back');
Route::resource('duyetdktd','manage\ktcaccap\DangKyTdXdController');

//laphosotd
Route::get('laphosotddf/themdoituong','manage\ktcaccap\LapHoSoTddfController@themdoituong');
Route::get('laphosotddf/delete','manage\ktcaccap\LapHoSoTddfController@delete');
Route::get('laphosotddf/suadoituong','manage\ktcaccap\LapHoSoTddfController@suadoituong');
Route::get('laphosotddf/update','manage\ktcaccap\LapHoSoTddfController@updatedt');

Route::get('laphosotdct/boxungdt','manage\ktcaccap\LapHoSoTdctController@boxungdt');
Route::get('laphosotdct/delete','manage\ktcaccap\LapHoSoTdctController@delete');
Route::get('laphosotdct/chinhsuadt','manage\ktcaccap\LapHoSoTdctController@chinhsuadt');
Route::get('laphosotdct/update','manage\ktcaccap\LapHoSoTdctController@updatedt');

Route::resource('laphosotd','manage\ktcaccap\LapHoSoTdController');
Route::post('laphosotd/delete','manage\ktcaccap\LapHoSoTdController@delete');
Route::post('laphosotd/trans','manage\ktcaccap\LapHoSoTdController@trans');
Route::get('checkmahs','manage\ktcaccap\LapHoSoTdController@checkkihieu');

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