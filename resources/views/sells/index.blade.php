@extends('layouts.app')

@section('page-title' , 'Sell Reports')

@section('header')

    <link rel="stylesheet" href="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}">
    <style>
        .barcode-sticker{
            background: #FFF;
            padding: 8px;
            padding-bottom: 0;
        }
        .barcode-sticker img{
            max-width: 100%;
            width: 185px;
            height: 46px;
        }
        span.product-id {
            text-align: center;
            display: inherit;
            font-weight: bold;
            color: #000;
            font-size: 12px;
            letter-spacing: 8px;
        }
    </style>

@stop
@section('footer')
    <script src="{{ asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "order": ['0' , 'desc'],
                pageLength: 49
            });
        } );
    </script>
@stop

@section('page-content')
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-uppercase">Sell Reports</h1>
                {{--  <table id="datatable" class="table table-hover">
                    <thead>
                        <tr>
                            <th width="10%">Sell ID#</th>
                            <th width="20%">Time</th>
                            <th width="20%">Product Name</th>
                            <th width="15%">Buy Price</th>
                            <th>Sell Price</th>
                            <th>Quantity</th>
                            <th>Net Price</th>
                            <th>Net Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sells as $sell)
                            <tr>
                                <td>{{ $sell->id }}</td>
                                <td>
                                    {{ $sell->created_at->format('d/m/y') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ $sell->created_at->format('g:i:s a') }}
                                
                                </td>
                                <td>{{ $sell->product->name }}</td>
                                <td>{{ $sell->product->buy_price }}</td>
                                <td>{{ $sell->sell_price }}</td>
                                <td>{{ $sell->quantity }}</td>
                                <td>{{ $sell->quantity * $sell->sell_price }}</td>
                                <td>{{ ($sell->quantity * $sell->sell_price) - ($sell->quantity * $sell->product->buy_price)  }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>  --}}
                <sell-report></sell-report>
            </div>
        </div>
    </div>
@stop