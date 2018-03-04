@extends('layouts.app')

@section('page-title' , 'Edit Customer')

@section('page-content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8 mr-auto ml-auto">
                <div class="text-center">
                    <h1>{{ $customer->name }}</h1>
                    <a href="{{ route('customers.edit' , $customer->id ) }}"><b>[Edit]</b></a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="{{ route('shoppinghistory' , $customer->id) }}"><b>[Shopping History]</b></a>
                </div>
                <br>
                <table class="table">
                    <tr>
                        <td><b>Email:</b></td>
                        <td>{{ $customer->email }}</td>
                    </tr>
                    <tr>
                        <td><b>Phone Number:</b></td>
                        <td>{{ $customer->number }}</td>
                    </tr>
                    <tr>
                        <td><b>Address:</b></td>
                        <td>{{ $customer->address }}</td>
                    </tr>
                    <tr>
                        <td><b>Note:</b></td>
                        <td>{{ $customer->note }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@stop