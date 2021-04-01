@extends('layouts.customer')
@section('content')
@php 
    $subtotal = 0;
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row mt-5">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>#quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="col-md-9"><em>{{ $order->product->title }}</em></h4></td>
                            <td class="col-md-1" style="text-align: center"> {{ $order->quantity }} </td>
                            <td class="col-md-1 text-center"><i class="fa fa-rupee-sign" aria-hidden="true"></i> {{ $order->product->mrp=$order->product->mrp - $order->product->discount/100*$order->product->mrp }}</td>
                            <td class="col-md-1 text-center">@php $amount = $order->product->mrp * $order->quantity @endphp {{$amount}}</td>
                        </tr>
                        @php $subtotal += $amount @endphp
                        @endforeach
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal:</strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong><i class="fa fa-rupee-sign" aria-hidden="true"></i> {{ $subtotal }}</strong>
                            </p>
                            <p>
                                <strong>0</strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h5><strong>Total: </strong></h5></td>
                            <td class="text-center text-danger"><h4><strong><i class="fa fa-rupee-sign" aria-hidden="true"></i>{{ $subtotal }}  </strong></h4></td>
                        </tr>
                    </tbody>
                </table>
            </div>
             
            <form method="POST" action="/home/cart/order/payment/{{$subtotal}}">
                @csrf
                <div class="form-group ">
                    <button type="submit" class="btn btn-success btn-lg btn-block form-control btn-lg btn-block">    Pay Now   <span class="glyphicon glyphicon-chevron-right"></span></button>
                </div>
            </form>
        </div>
    </div>
@endsection