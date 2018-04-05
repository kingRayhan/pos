<?php



Route::middleware('auth')->group(function () {
    Route::get('/' , function(){
        return view('index');
    });
    Route::resource('/products' , 'ProductController');
    Route::resource('/product_categories' , 'ProductCategoryController');
    Route::resource('/sells' , 'SellController');
    /**
     * Category Archieve
     */
    Route::get('product_categories/{id}/products' , 'ProductCategoryController@products')->name('product_category.products');


    Route::post('/sells/sellProduct/' , 'SellController@sellProduct');
    Route::resource('customers' , 'CustomerController');
    Route::get('customers/{customer}/shoppinghistory' , 'CustomerController@shoppinghistory')->name('shoppinghistory');

    /**
     * Slips
     */
    Route::get('/slips' , 'SlipController@index')->name('slips.index');


    /**
     * API
     */
    Route::get('/apirequest/sells/index' , 'SellApiController@index');
    Route::post('apirequest/customers/index' , 'CustomerController@indexApi');
    Route::get('apirequest/products/index' , 'ProductApiController@index');
    Route::get('apirequest/products/categories' , 'ProductApiController@categories');

    Route::post('/products/getProductData/{product_id}' , 'ProductController@getProductData');
});


Auth::routes();

