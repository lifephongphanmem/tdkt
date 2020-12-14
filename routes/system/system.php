<?php
Route::resource('general','GeneralConfigsController');
Route::get('setting','GeneralConfigsController@setting');
Route::post('setting','GeneralConfigsController@updatesetting');

//Users
Route::get('login','UsersController@login');
Route::post('signin','UsersController@signin');
Route::get('/change-password','UsersController@cp');
Route::post('/change-password','UsersController@cpw');
Route::get('/user_setting','UsersController@settinguser');
Route::post('/user_setting','UsersController@settinguserw');
Route::get('/checkpass','UsersController@checkpass');
Route::get('/checkuser','UsersController@checkuser');
Route::get('/checkmasothue','UsersController@checkmasothue');
Route::get('logout','UsersController@logout');
Route::get('users','UsersController@index');
Route::get('users/{id}/edit','UsersController@edit');
Route::patch('users/{id}','UsersController@update');
Route::get('users/{id}/phan-quyen','UsersController@permission');
Route::post('users/phan-quyen','UsersController@uppermission');
Route::post('users/delete','UsersController@destroy');
Route::get('users/lock/{id}/{pl}','UsersController@lockuser');
Route::get('users/unlock/{id}/{pl}','UsersController@unlockuser');
Route::get('users/create','UsersController@create');
Route::post('users','UsersController@store');
Route::get('users/{id}/copy','UsersController@copy');

Route::get('users/print','UsersController@prints');

Route::resource('xetduyettdttdn','TdTtDnController');
Route::post('xetduyettdttdn/tralai','TdTtDnController@tralai');
Route::get('xetduyettdttdn/{id}/duyet','TdTtDnController@duyet');

Route::resource('thongtinngaynghile','NgayNghiLeController');
Route::post('thongtinngaynghile/delete','NgayNghiLeController@destroy');

Route::resource('userscompany','UsersCompanyController');
Route::get('userscompany/{id}/permission','UsersCompanyController@permission');
Route::post('userscompany/phan-quyen','UsersCompanyController@uppermission');
//EndUsers
Route::get('thongtindonvi','ThongTinDonViController@index');
Route::get('thongtindonvi/edit','ThongTinDonViController@edit');
Route::post('thongtindonvi','ThongTinDonViController@update');

Route::get('register','Auth\RegisterController@index');
Route::get('register/{id}','Auth\RegisterController@show');
Route::post('register/tralai','Auth\RegisterController@tralai');
Route::post('register/kichhoat','Auth\RegisterController@kichhoat');

//Danh mục danh hiệu thi đua
Route::resource('dmdanhhieutd','DmdanhhieutdController');
Route::post('dmdanhhieutd/delete','DmdanhhieutdController@destroy');
Route::get('checkmadanhhieutd','DmdanhhieutdController@checkmadanhhieutd');

//Danh mục tiêu chuẩn danh hiệu thi đua
Route::resource('dmtieuchuandhtd','DmtieuchuandhtdController');
Route::post('dmtieuchuandhtd/delete','DmtieuchuandhtdController@destroy');
Route::get('checkmatieuchuandhtd','DmtieuchuandhtdController@checkmatieuchuandhtd');
//Danh mục hình thức khen thưởng
Route::resource('dmhinhthuckt','DmhinhthucktController');
Route::post('dmhinhthuckt/delete','DmhinhthucktController@destroy');
Route::get('checkmahinhthuckt','DmhinhthucktController@checkmahinhthuckt');


?>