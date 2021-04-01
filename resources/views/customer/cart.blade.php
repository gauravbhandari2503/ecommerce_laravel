@extends('layouts.customer')
@section('content')
@php 
	$amount = 0
@endphp
<!------ Include the above in your HEAD tag ---------->

@if(!$carts->first())
	<h1 class="mt-5 text-center display-1"> Cart is Empty </h1>
@else
<div class="col-sm-2  mt-5 mr-2">
    <a type="button" class="btn btn-primary btn-sm btn-block " href="{{ url('/home/items') }}">
        <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
    </a>
</div>
<div class="container-fluid mt-5 p-5">
	<div class="row">
		<div class="col-xs-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h3><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h3>
							</div>
						</div>
					</div>
				</div>
				@foreach($carts as $cart)
					<div class="panel-body mt-3">
						<div class="row">
							<div class="col-xs-2"><img class="img-responsive" src="">
							</div>
							<div class="col-xs-4 ml-1">
								<h4 class="product-name"><strong>{{ $cart->product->title }}</strong></h4>
							</div>
							<div class="col-xs-6">
								<div class="col-xs-6 text-right">
									<h6><strong><i class="fa fa-rupee-sign" aria-hidden="true"></i> {{ $cart->product->mrp=$cart->product->mrp - $cart->product->discount/100*$cart->product->mrp }} <span class="text-muted">x</span></strong></h6>
								</div>
								<div class="col-xs-6 mt-3 ">
									<a class="btn btn-danger" href="cart/dec/{{$cart->id}}" type="submit">-</a>
									<input type="text" class="input-sm ml-1" value="{{ $cart->quantity }}" disabled>
									<a class="btn btn-success" href="cart/inc/{{$cart->id}}" type="submit">+</a>
								</div>
							</div>
						</div>
						<hr>
					@php
						$amount += $cart->quantity * ($cart->product->mrp)
					@endphp
					@endforeach
					{!! $carts->links() !!}

					<div class="row">
						<div class="text-center">
							<div class="col-xs-9">
								<a href="#"><h6 class="text-right">Added items?</h6></a>
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="panel-footer mt-2">
					<div class="row text-center">
						<div class="col-xs-9">
							<h5 class="text-right">Total: <i class="fa fa-rupee-sign" aria-hidden="true"></i> <strong> {{$amount}} </strong></h5>
						</div>
						
					</div>
				</div>
                <div class="col-xs-3">
				<form method="POST" action="{{ route('order') }}">
					@csrf
					@method('GET')
                    <button type="submit" class="btn btn-success btn-block">
                        Checkout
                    </button>
                </div>
			</div>
		</div>
	</div>
	@if ($message = Session::get('message'))
        <div class="alert alert-danger">
            <p>{{$message}}</p>
        </div>
    @endif
</div>
@endif
@endsection