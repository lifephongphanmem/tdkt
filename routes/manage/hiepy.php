<?php
//Hiệp y khen thưởng
Route::resource('hiepykhenthuong','manage\hiepy\HiepYkhenthuongController');
Route::post('hiepykhenthuong/delete','manage\hiepy\HiepYkhenthuongController@destroy');
Route::get('checkmahiepy','manage\hiepy\HiepYkhenthuongController@checkmahiepy');
Route::post('hiepykhenthuong/deleteyk','manage\hiepy\HiepYkhenthuongController@deleteyk');
