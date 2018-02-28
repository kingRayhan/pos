@extends('layouts.app')

@section('page-title' , 'Edit Product')

@section('page-content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8 mr-auto ml-auto">
                <div class="text-center">
                    <h1>Edit Product</h1>
                </div>
                <form action="{{ route('products.update' , $product) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input 
                            id="name"
                            type="text" 
                            name="name" 
                            class="form-control" 
                            placeholder="Product Name" 
                            value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="buy_price">Buying Price:</label>
                        <input 
                            id="buy_price"
                            type="text" 
                            class="form-control" 
                            name="buy_price" 
                            placeholder="Buying Price" 
                            value="{{ $product->buy_price }}">
                    </div>
                    <div class="form-group">
                        <label for="sell_price">Selling Price:</label>
                        <input 
                        id="sell_price"
                        type="text" 
                        class="form-control" 
                        name="sell_price" 
                        placeholder="Selling Price"
                        value="{{ $product->sell_price }}">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock Limit:</label>
                        <input 
                        id="stock"
                        type="text" 
                        class="form-control" 
                        name="stock" 
                        placeholder="Stock Limit" 
                        value="{{ $product->stock }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop