@extends('layouts.customer')
@section('content')
<div class="container mt-5">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{$message}}</p>
        </div>
    @endif
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col"># Order ID</th>
        <th scope="col">Product Name</th>
        <th scope="col">Order Created At:</th>
        <th scope="col">Order Shipping Date:</th>
        <th scope="col">Current Status</th>
        <th scope="col">Quantity</th>
        <th scope="col">Amount</th>
        <th scope="col">Option</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
        <th scope="row">{{ $order->id }}</th>
        <td>{{ $order->product->title }}</td>
        <td>{{ $order->created_at }}</td>
        <td>@if($order->shipped_date === NULL) Not Yet  @else {{ $order->shipped_date }} @endif </td>
        <td>@foreach($order->statuses as $name) {{ $name->status }} @endforeach </td>
        <td>{{ $order->quantity }}</td>
        <td><i class="fa fa-rupee-sign" aria-hidden="true"></i> {{ $order->amount }}</td>
        <td>
        @if($name->id === 4 || $name->id === 5)
                <a type="submit" href="/home/orders/item/{{ $order->id }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
        @else
                <a type="submit" href="/home/orders/item/{{ $order->id }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
                <a type="submit" href="/home/orders/cancel/{{ $order->id }}" class="btn btn-danger mt-1">x Cancel Order</a>
        @endif    
        </td>
        </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection