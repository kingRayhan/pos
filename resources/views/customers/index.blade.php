@extends('layouts.app')

@section('page-title' , 'Customers')

@section('page-content')
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-uppercase">All Customers</h1>
                <customer-list></customer-list>
            </div>
        </div>
    </div>
@stop