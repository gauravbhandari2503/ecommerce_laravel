@extends('layouts.customer')
@section('content')
<div class="container text-center mt-5">
    <img class="card-img-top" style="height:400px; width:400px;" src="/storage/products/{{ $item->image }}" alt="Card image cap">
</div>
<div class="card mt-5 h-100">
    <div class="card-header">
        <h1>{{$item->title}}</h1>
        <h5>Category :
        @php
            $cat= $item->category->parents;
            $categories = [];
            while($cat){
                array_push($categories, $cat);
                $cat=$cat->parent;
            }
        @endphp
        @foreach ( array_reverse($categories) as $catty )
            {{ $catty->name }} /
        @endforeach 
        {{$item->category->name}} 
        </h5>
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $item->description }}</h5>
        <h5 class="card-title">{{ $item->specification }}</p></h5>
        <h5 class="card-text" style="text-decoration:line-through;"><i class="fa fa-rupee-sign" aria-hidden="true"></i>{{ $item->mrp }} </h5> Discounted Price: <span class="card-text"><i class="fa fa-rupee-sign" aria-hidden="true"></i>{{ $item->mrp=$item->mrp - $item->discount/100*$item->mrp }} </span>
    </div>
    
    <div class="card-body">
        <form action="/home/wishlist/add/{{$item->id}}" method="POST">
        @csrf
            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-heart"></i>Add To Wishlist</button>
        </form>
        <form action="/home/cart/add/{{$item->id}}" method="POST">
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

<div class="card">
    @if(!$item->reviews->first())
    @else
    <div class="card-header">
        <h3 class="font-weight-bold display-4">Reviews</h3>
    </div> 
    @foreach($item->reviews as $review)
    <blockquote class="blockquote text-left">
        <p class="mb-0">{{$review->comment}}</p>
        <footer class="blockquote-footer">{{$review->user->name}}</footer>
        <small class="text-muted">
        @for($i=1;$i<=5;$i++)
            @if($i<=$review->rating)
            &#9733;
            @else
            &#9734;
            @endif
        @endfor
        </small>
    </blockquote>
    @endforeach
    @endif
</div>        
@endsection