@extends('layouts.customer')
@section('content')
<div class="jumbotron text-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Your order has been placed.</strong> You can check your order status in Orders menu.</p>
  <hr>
  <p>
    Having trouble? <a href="">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="{{ url('/home/items') }}" role="button">Continue to homepage</a>
  </p>
</div>
@endsection