<?php
//Quản lý quyết định
Route::get('qlquyetdinhktdf/storett','manage\qltailieu\quyetdinh\QuyetDinhdfController@store');
Route::get('qlquyetdinhktdf/delete','manage\qltailieu\quyetdinh\QuyetDinhdfController@delete');
Route::resource('qlquyetdinhkt','manage\qltailieu\quyetdinh\QuyetDinhController');


//Quản lý tờ trình
Route::resource('qltotrinhkt','manage\qltailieu\totrinh\ToTrinhController');

//Quản lý biên bản
Route::resource('qlbienban','manage\qltailieu\bienban\BienBanController');

//phong trào thi đua
Route::resource('qlphontraotd','manage\qltailieu\phongtrao\PhongTraoController');

