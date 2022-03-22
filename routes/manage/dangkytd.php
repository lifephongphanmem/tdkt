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

//Danh mục danh hiệu thi đua
//Route::resource('dmdanhhieutd','DmdanhhieutdController');
//Route::post('dmdanhhieutd/delete','DmdanhhieutdController@destroy');
//Route::get('checkmadanhhieutd','DmdanhhieutdController@checkmadanhhieutd');
//17/03/2022
Route::group(['prefix'=>'DanhKyThiDua'], function(){
    Route::get('ThongTin','manage\ktcaccap\DangKyTdController@ThongTin');
    Route::get('Them','manage\ktcaccap\DangKyTdController@Them');
    Route::post('Them','manage\ktcaccap\DangKyTdController@store');
    Route::get('Sua','manage\ktcaccap\DangKyTdController@Sua');

    Route::get('ThemKhenThuong','manage\ktcaccap\DangKyTdController@ThemKhenThuong');
    Route::get('ThemTieuChuan','manage\ktcaccap\DangKyTdController@ThemTieuChuan');

    //Route::get('Sua','system\DSTaiKhoanController@edit');
});