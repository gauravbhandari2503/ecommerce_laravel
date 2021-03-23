@extends('layouts.customer')
@section('content')
<div class="container mt-5">
    <div class="card">
    <table class="table table-hover shopping-cart-wrap">
        <thead class="text-muted">
            <tr>
                <th scope="col">Product</th>
                <th scope="col" width="120">Availability</th>
                <th scope="col" width="120">Price</th>
                <th scope="col" width="200" class="text-right">Action</th>
            </tr>
        </thead>
    <tbody>
    @foreach($wishlists as $wishlist)
    <tr>
	    <td>
            <figure class="media">
	        <div class="img-wrap"><img src="http://bootstrap-ecommerce.com/main/images/items/2.jpg" class="img-thumbnail img-sm"></div>
	        <figcaption class="media-body">
		    <h6 class="title text-truncate">{{ $wishlist->product->title }} </h6>
		        <dl class="param param-inline small">
                    <dt>Discount <i class="fas fa-tag"></i> </dt>
                    <dd>{{ $wishlist->product->discount }} % </dd>
		        </dl>
		        <dl class="param param-inline small">
                    <dt>Original Price: </dt>
                    <dd><i class="fa fa-rupee-sign" aria-hidden="true"></i>{{ $wishlist->product->mrp }} </dd>
		        </dl>
	        </figcaption>
            </figure> 
	    </td>
	    <td> 
		    <input type="text" class="form-control" disabled value="@if($wishlist->product->stock > 10) Available @elseif($wishlist->product->stock === '0') Out Of Stock  @else {{$wishlist->product->stock}} Left @endif">
	    </td>
	    <td> 
            <div class="price-wrap"> 
                <var class="price"><i class="fa fa-rupee-sign" aria-hidden="true"></i> {{ $wishlist->product->mrp=$wishlist->product->mrp - $wishlist->product->discount/100*$wishlist->product->mrp }}</var> 
            </div> <!-- price-wrap .// -->
	    </td>
	    <td class="text-right"> 
            <form action="/home/cart/add/{{$wishlist->product->id}}" method="POST">
            @csrf
                <button type="submit" class="btn btn-outline-success" ><i class="fa fa-heart"></i> Cart</button> 
            </form>
            <form action="/home/wishlist/{{$wishlist->id}}" method="POST">
            @csrf
                <button type="submit"  class="btn btn-outline-danger mt-1"> × Remove</button>
            </form>
	    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div> <!-- card.// -->
    {!! $wishlists->links() !!}
    @if($message = Session::get('message'))
        <div class="alert alert-danger">
            <p>{{$message}}</p>
        </div>
    @endif
</div> 
    
    @endsection