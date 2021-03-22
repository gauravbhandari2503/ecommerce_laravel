@extends('layouts.customer')
@section('content')
<!------ Include the above in your HEAD tag ---------->
<div class="col-xs-6 float-right mt-5 mr-2">
    <a type="button" class="btn btn-primary btn-sm btn-block " href="{{ url('/home/items') }}">
        <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
    </a>
</div>
<div class="container mt-5 float-right">
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
							<h4 class="product-name"><strong>{{ $cart->product->title }}</strong></h4><h4><small>{{ $cart->product->description }}</small></h4>
						</div>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6><strong><i class="fa fa-rupee-sign" aria-hidden="true"></i> {{ $cart->product->mrp=$cart->product->mrp - $cart->product->discount/100*$cart->product->mrp }} <span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<input type="text" class="form-control input-sm" value="{{ $cart->quantity }}" disabled>
							</div>
							<div class="col-xs-2">
								<button type="button" class="btn btn-link btn-xs">
									<span class="glyphicon glyphicon-trash"> </span>
								</button>
							</div>
						</div>
					</div>
					<hr>
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
							<h5 class="text-right">Total: <i class="fa fa-rupee-sign" aria-hidden="true"></i> {{ $amount }} <strong></strong></h5>
						</div>
						
					</div>
				</div>
                <div class="col-xs-3">
				<form method="POST" action="/home/cart/payment/{{ $amount }}">
					@csrf
                    <button type="submit" class="btn btn-success btn-block">
                        Checkout
                    </button>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection