@extends('layouts.app')

@section('page-title' , 'Add new Product')

@section('page-content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8 mr-auto ml-auto">
                <div class="text-center">
                    <h1>Add new Product</h1>
                </div>
                <form action="{{ route('products.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input 
                                id="name"
                                type="text" 
                                name="name" 
                                class="form-control" 
                                placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label for="buy_price">Buying Price:</label>
                            <input 
                                id="buy_price"
                                type="text" 
                                class="form-control" 
                                name="buy_price" 
                                placeholder="Buying Price">
                        </div>
                        <div class="form-group">
                            <label for="sell_price">Selling Price:</label>
                            <input 
                            id="sell_price"
                            type="text" 
                            class="form-control" 
                            name="sell_price" 
                            placeholder="Selling Price">
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock Limit:</label>
                            <input 
                            id="stock"
                            type="text" 
                            class="form-control" 
                            name="stock" 
                            placeholder="Stock Limit">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                </form>
            </div>
        </div>
    </div>
@stop