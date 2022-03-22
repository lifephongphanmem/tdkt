<?php

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

Route::group(['prefix'=>'HoSoThiDua'], function(){
    Route::get('ThongTin','manage\ktcaccap\LapHoSoTdController@ThongTin');
    Route::get('Them','manage\ktcaccap\LapHoSoTdController@Them');
    Route::post('Them','manage\ktcaccap\LapHoSoTdController@LuuHoSo');

    Route::get('ThemDoiTuong','manage\ktcaccap\LapHoSoTdController@ThemDoiTuong');
    Route::get('LayTieuChuan','manage\ktcaccap\LapHoSoTdController@LayTieuChuan');
});

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