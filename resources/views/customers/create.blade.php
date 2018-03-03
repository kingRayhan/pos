@extends('layouts.app')

@section('page-title' , 'Add new Customer')

@section('page-content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8 mr-auto ml-auto">
                <div class="text-center">
                    <h1>Add new Customer</h1>
                </div>
                <form action="{{ route('customers.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                            <label for="name">Customer Name:</label>
                            <input 
                                id="name"
                                type="text" 
                                name="name" 
                                class="form-control" 
                                placeholder="Customer Name"
                                value="{{ old('name') }}"
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
                                value="{{ old('email') }}"
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
                            value="{{ old('number') }}"
                            >
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea 
                            id="address"
                            class="form-control" 
                            name="address" 
                            placeholder="Stock Limit">{{ old('address') }}</textarea>
                        <div class="form-group">
                            <label for="note">Note:</label>
                            <textarea 
                            id="note"
                            class="form-control" 
                            name="note" 
                            placeholder="Stock Limit">{{ old('note') }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                </form>
            </div>
        </div>
    </div>
@stop