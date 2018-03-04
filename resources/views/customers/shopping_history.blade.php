@extends('layouts.app')

@section('page-title' , 'Shopping History')

@section('page-content')
    <div class="container pt-5">
        <div class="row" id="shoppingHistory">
            <div class="col-md-8 mr-auto ml-auto">
                <div class="text-center">
                    <h2>{{ $customer->name }}'s Shopping History</h2>
                    <a href="{{ route('customers.index') }}"><b>[Customer List]</b></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="{{ route('customers.show' , $customer->id) }}"><b>[Customer Details]</b></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button onclick="printJS('shoppingHistory' , 'html')"><i class="fa fa-print"></i> Print</button>
                </div>
                <br>
                <table class="table">
                    <tr>
                        <th>Time</th>
                        <th>Item</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>cost</th>
                    </tr>
                    @foreach($customer->buy as $buy)
                    <tr>
                        <td>
                                {{ $buy->created_at->format('d/m/Y') }}
                                &nbsp;&nbsp;&nbsp;
                                {{ $buy->created_at->format('h:i A') }}
                        </td>
                        <td>{{ $buy->product->name }}</td>
                        <td>{{ $buy->product->sell_price }}</td>
                        <td>{{ $buy->quantity }}</td>
                        <td>{{ $buy->sell_price * $buy->quantity }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Total:</b></td>
                        <td>{{ $customer->totalSpend() }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@stop