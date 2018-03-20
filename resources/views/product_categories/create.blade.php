@extends('layouts.app')

@section('page-title' , 'Add new Product')

@section('page-content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8 mr-auto ml-auto">
                <div class="text-center">
                    <h1>Add new Category</h1>
                </div>
                <form action="{{ route('product_categories.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Category Name:</label>
                        <input
                                id="name"
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Category Name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="desc">Node/Description:</label>
                        <textarea name="desc" id="desc" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@stop