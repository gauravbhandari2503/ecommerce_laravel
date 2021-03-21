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
        <form action="/home/wishlist/add/{{$item->id}}" method="POST">
        @csrf
            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-heart"></i>Add To Wishlist</button>
        </form>
        <form>
        @csrf
            <button class="btn btn-outline-success mt-2"><i class="fas fa-shopping-cart"></i>Add To Cart</button>
        </form>
    </div>
    @if ($message = Session::get('message'))
        <div class="alert alert-danger">
            <p>{{$message}}</p>
        </div>
    @endif
</div>
        
@endsection