<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $product_cats = ProductCategory::all();
       return view('product_categories.index' , compact('product_cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request)
    {
        ProductCategory::create([
           'name' => $request->name,
           'desc' => $request->desc,
        ]);
        return redirect()->route('product_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show($cat_id)
    {
//        return view('product_categories.index' , compact('products'));
    }


    public function products($id)
    {
        $product_cat = ProductCategory::find($id);
        return view('product_categories.products' , compact('product_cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('product_categories.edit' , compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
        ProductCategory::find($productCategory->id)
            ->update([
                'name' => $request->name,
                'desc' => $request->desc
            ]);
        return redirect()->route('product_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        ProductCategory::destroy($productCategory->id);
        return redirect()->route('product_categories.index');
    }
}
