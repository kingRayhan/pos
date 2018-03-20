@extends('layouts.app')

@section('page-title' , 'Add new Product')

@section('page-content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8 mr-auto ml-auto">
                <div class="text-center">
                    <h1>Edit Category</h1>
                </div>
                <form action="{{ route('product_categories.update' , $productCategory ) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="name">Category Name:</label>
                        <input
                                id="name"
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Category Name" value="{{ $productCategory->name }}">
                    </div>
                    <div class="form-group">
                        <label for="desc">Node/Description:</label>
                        <textarea name="desc" id="desc" cols="30" rows="10" class="form-control">{{$productCategory->desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@stop