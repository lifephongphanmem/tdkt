<?php
//đối tượng cá nhân
Route::resource('qldoituongcn','manage\qldoituong\QlDoiTuongCNController');
Route::post('qldoituongcn/delete','manage\qldoituong\QlDoiTuongCNController@delete');
Route::post('qldoituongcn/trans','manage\qldoituong\QlDoiTuongCNController@trans');
Route::get('checkmadinhdanh','manage\qldoituong\QlDoiTuongCNController@checkmadinhdanh');

//đối tượng tập thể
Route::resource('qldoituongtt','manage\qldoituong\QlDoiTuongTTController');
Route::post('qldoituongtt/delete','manage\qldoituong\QlDoiTuongTTController@delete');
Route::post('qldoituongtt/trans','manage\qldoituong\QlDoiTuongTTController@trans');

//danh mục phân loại đối tượng
Route::resource('dmphanloaidt','manage\qldoituong\DmPhanLoaidtController');
Route::post('dmphanloaidt/delete','manage\qldoituong\DmPhanLoaidtController@delete');
Route::post('dmphanloaidt/trans','manage\qldoituong\DmPhanLoaidtController@trans');
Route::get('checkmapldt','manage\qldoituong\DmPhanLoaidtController@checkmapl');

//Danh mục phân loại đối tượng chi tiết
Route::resource('dmphanloaict','manage\qldoituong\DmPhanLoaictController');
Route::post('dmphanloaict/delete','manage\qldoituong\DmPhanLoaictController@delete');
Route::post('dmphanloaict/trans','manage\qldoituong\DmPhanLoaictController@trans');
Route::get('checkmaplct','manage\qldoituong\DmPhanLoaictController@checkmadtcn');

