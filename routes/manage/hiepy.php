<?php
//Hiệp y khen thưởng
Route::resource('hiepykhenthuong','manage\hiepy\HiepYkhenthuongController');
Route::post('hiepykhenthuong/delete','manage\hiepy\HiepYkhenthuongController@destroy');
Route::get('checkmahiepy','manage\hiepy\HiepYkhenthuongController@checkmahiepy');
Route::get('hiepykhenthuong/{id}/ykien','manage\hiepy\HiepYkhenthuongController@ykien');
Route::get('hiepykhenthuong/{id}/dsykien','manage\hiepy\HiepYkhenthuongController@dsykien');
Route::post('hiepykhenthuong/deleteyk','manage\hiepy\HiepYkhenthuongController@deleteyk');
Route::post('hiepykhenthuong/storeyk','manage\hiepy\HiepYkhenthuongController@storeyk');
Route::post('hiepykhenthuong/{id}/dsykien','manage\hiepy\HiepYkhenthuongController@dsykien');
