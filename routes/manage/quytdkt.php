<?php
//Phiếu thu
Route::resource('qldauvao','manage\quytdkt\QlphieuthuController');
Route::post('qldauvao/delete','manage\quytdkt\QlphieuthuController@destroy');
Route::get('checkmaphieuthu','manage\quytdkt\QlphieuthuController@checkmaphieuthu');

//Phiếu chi
Route::resource('qlchihdtdkt','manage\quytdkt\QlphieuchiController');
Route::post('qlchihdtdkt/delete','manage\quytdkt\QlphieuchiController@destroy');
Route::get('checkmaphieuchi','manage\quytdkt\QlphieuchiController@checkmaphieuchi');

//Danh mục chi
Route::resource('qldmchi','manage\quytdkt\QldmchiController');
Route::post('qldmchi/delete','manage\quytdkt\QldmchiController@destroy');
Route::get('checkmadmchi','manage\quytdkt\QldmchiController@checkmadmchi');

//Sổ quỹ
Route::resource('baocaoquy','manage\quytdkt\BaocaoquyController');
Route::post('soquythu','manage\quytdkt\BaocaoquyController@soquythu');
Route::post('soquychi','manage\quytdkt\BaocaoquyController@soquychi');
