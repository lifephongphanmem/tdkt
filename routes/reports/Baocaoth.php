<?php
//Báo cáo 07.01
Route::resource('01N-BNV-TĐKT','reports\NBNVTĐKT01Controller');
Route::post('baocao01N','reports\NBNVTĐKT01Controller@baocao');

//Báo cáo 07.02
Route::resource('02N-BNV-TĐKT','reports\NBNVTĐKT02Controller');
Route::post('baocao02N','reports\NBNVTĐKT02Controller@baocao');

//Báo cáo 07.03
Route::resource('03N-BNV-TĐKT','reports\NBNVTĐKT03Controller');
Route::post('baocao03N','reports\NBNVTĐKT03Controller@baocao');

