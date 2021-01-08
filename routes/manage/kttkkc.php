<?php
//chongphapcanhan
Route::resource('chongphapcanhan','manage\kttkkc\chongphapcanhan\ChongPhapCaNhanController');
Route::post('chongphapcanhan/delete','manage\kttkkc\chongphapcanhan\ChongPhapCaNhanController@delete');

//chongmycanhan
Route::resource('chongmycanhan','manage\kttkkc\chongmycanhan\ChongMyCaNhanController');
Route::post('chongmycanhan/delete','manage\kttkkc\chongmycanhan\ChongMyCaNhanController@delete');

//chongmygiadinh
Route::resource('chongmygiadinh','manage\kttkkc\chongmygiadinh\ChongMyGiaDinhController');
Route::post('chongmygiadinh/delete','manage\kttkkc\chongmygiadinh\ChongMyGiaDinhController@delete');

//ktthutuong
Route::resource('ktthutuong','manage\kttkkc\ktthutuong\KtThuTuongController');
Route::post('ktthutuong/delete','manage\kttkkc\ktthutuong\KtThuTuongController@delete');

//ktctubnd
Route::resource('ktctubnd','manage\kttkkc\ktctubnd\KtCtUbNdController');
Route::post('ktctubnd/delete','manage\kttkkc\ktctubnd\KtCtUbNdController@delete');

//kyniemchuong
Route::resource('kyniemchuong','manage\kttkkc\kyniemchuong\KyNiemChuongController');
Route::post('kyniemchuong/delete','manage\kttkkc\kyniemchuong\KyNiemChuongController@delete');
