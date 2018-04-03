<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductsResource;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    function index()
    {
        return ProductsResource::collection(Product::all());
    }
    function categories()
    {
        return CategoryResource::collection(ProductCategory::all());
    }
}
