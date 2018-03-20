<?php



Route::middleware('auth')->group(function () {
    Route::get('/' , function(){
        return view('index');
    });
    Route::resource('/products' , 'ProductController');
    Route::resource('/product_categories' , 'ProductCategoryController');
    Route::resource('/sells' , 'SellController');
    Route::post('/products/getProductData/{product_id}' , 'ProductController@getProductData');
    Route::post('/sells/sellProduct/' , 'SellController@sellProduct');
    Route::get('/apirequest/sells/index' , 'SellApiController@index');
    Route::resource('customers' , 'CustomerController');
    Route::post('apirequest/customers/index' , 'CustomerController@indexApi');
    Route::get('customers/{customer}/shoppinghistory' , 'CustomerController@shoppinghistory')->name('shoppinghistory');
});


Auth::routes();

