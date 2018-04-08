<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\Sell;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_cats = ProductCategory::all();
        return view('products.create' , compact('product_cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Product::create([
            'name' => $request->name,
            'buy_price' => $request->buy_price,
            'sell_price' => $request->sell_price,
            'stock' => $request->stock,
            'product_category_id' => $request->product_category_id == 'null' ? NULL : $request->product_category_id
        ]);

        return redirect()->route('products.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product_cats = ProductCategory::all();
        $cat_id = $product->product_category_id;
        return view('products.edit' , compact('product' , 'product_cats' , 'cat_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        Product::find($product->id)
            ->update([
                'name' => $request->name,
                'buy_price' => $request->buy_price,
                'sell_price' => $request->sell_price,
                'stock' => $request->stock,
                'product_category_id' => $request->product_category_id == 'null' ? NULL : $request->product_category_id
            ]);
            return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        Product::destroy($product_id);
        return redirect()->route('products.index');
    }

    public function getProductData($product_id)
    {
        return Product::find($product_id);
    }
}
