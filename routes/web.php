<?php


Route::resource('/products' , 'ProductController');
Route::resource('/sells' , 'SellController');
Route::post('/products/getProductData/{product_id}' , 'ProductController@getProductData');
Route::post('/sells/sellProduct/' , 'SellController@sellProduct');

// Route::get('test' , 'graphController@sellGraph');


Route::get('/apirequest/sells/index' , 'SellApiController@index');


Route::resource('customers' , 'CustomerController');
Route::post('apirequest/customers/index' , 'CustomerController@indexApi');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
