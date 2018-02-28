<?php






Route::resource('/products' , 'ProductController');
Route::resource('/sells' , 'SellController');
Route::post('/products/getProductData/{product_id}' , 'ProductController@getProductData');
Route::post('/products/sellProduct/' , 'ProductController@sellProduct');