@extends('layouts.customer')
@section('content')
<div class="container d-flex justify-content-center"> 
    <div class="card mt-5 " style="width: 48rem;">
        <img class="card-img-top ml-5" src="/storage/products/{{ $order->product->image }}" alt="Card image cap" style="height:500px; width:500px;">
    <div class="card-body">
        <h3 class="card-title">{{ $order->product->title }}</h3>
        <p class="card-text">{{ $order->product->description }}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><a class="btn btn-danger"><strong>Product Status: </strong> @foreach($order->statuses as $name) {{ $name->status }} @endforeach</a> </li>
        <li class="list-group-item"><p class="card-text">Acutal Price: <i class="fa fa-rupee-sign" aria-hidden="true"></i>{{ $order->product->mrp }} </p> Discounted Price: <span class="card-text"><i class="fa fa-rupee-sign" aria-hidden="true"></i>{{ $order->product->mrp=$order->product->mrp - $order->product->discount/100*$order->product->mrp }} </span></li>
        <li class="list-group-item">Quantity : {{ $order->quantity}}</li>
        <li class="list-group-item">Amount : {{ $order->amount}}</li>
    </ul>
    </div>
</div>
@endsection