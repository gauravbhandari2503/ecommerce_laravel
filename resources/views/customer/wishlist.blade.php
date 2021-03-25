@extends('layouts.customer')
@section('content')
<div class="container mt-5">
    
    @if($wishlists->first())
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
    @else
        <img style="width:800px; margin-left:120px;" src="data:image/png;base64,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">
    @endif
</div> 
    
    @endsection