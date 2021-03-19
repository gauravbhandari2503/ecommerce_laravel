@extends('layouts.customer')
@section('content')
<div class="container text-center mt-5">
    <img class="card-img-top" style="height:400px; width:400px;" src="/storage/products/{{ $item->image }}" alt="Card image cap">
</div>
<div class="card mt-5 ">
    <div class="card-header">
        <h1>{{$item->title}}</h1>
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $item->description }}</h5>
        <p class="card-text" style="text-decoration:line-through;"><i class="fa fa-rupee-sign" aria-hidden="true"></i>{{ $item->mrp }} </p> Discounted Price: <span class="card-text"><i class="fa fa-rupee-sign" aria-hidden="true"></i>{{ $item->mrp=$item->mrp - $item->discount/100*$item->mrp }} </span>
    </div>
    <div class="card-body">
        <a class="btn btn-outline-danger"><i class="fas fa-heart"></i></a>
        <a class="btn btn-outline-success"><i class="fas fa-shopping-cart"></i></a>
    </div>
</div>
        
@endsection