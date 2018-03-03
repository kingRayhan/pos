@extends('layouts.app')

@section('page-title' , 'Edit Customer')

@section('page-content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8 mr-auto ml-auto">
                <div class="text-center">
                    <h1>Edit Customer</h1>
                </div>
                <form action="{{ route('customers.update' , $customer->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                            <label for="name">Customer Name:</label>
                            <input 
                                id="name"
                                type="text" 
                                name="name" 
                                class="form-control" 
                                placeholder="Customer Name"
                                value="{{ $customer->name }}"
                                >
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input 
                                id="email"
                                type="text" 
                                class="form-control" 
                                name="email" 
                                placeholder="Email"
                                value="{{ $customer->email }}"
                                >
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number:</label>
                            <input 
                            id="phone_number"
                            type="text" 
                            class="form-control" 
                            name="number" 
                            placeholder="Phone Number"
                            value="{{ $customer->number }}"
                            >
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea 
                            id="address"
                            class="form-control" 
                            name="address" 
                            placeholder="Stock Limit">{{ $customer->address }}</textarea>
                        <div class="form-group">
                            <label for="note">Note:</label>
                            <textarea 
                            id="note"
                            class="form-control" 
                            name="note" 
                            placeholder="Stock Limit">{{ $customer->note }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                </form>
            </div>
        </div>
    </div>
@stop