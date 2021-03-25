@extends('layouts.customer')
@section('content')
<div class="container d-flex justify-content-center"> 
    <div class="card mt-5 " style="width: 48rem;">
        <img class="card-img-top ml-5" src="/storage/products/{{ $product->image }}" alt="Card image cap" style="height:500px; width:500px;">
    <div class="card-body">
        <h3 class="card-title">{{ $product->title }}</h3>
        <p class="card-text">Description :{{ $product->description }}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><p class="card-text">Acutal Price: <i class="fa fa-rupee-sign" aria-hidden="true"></i> {{ $product->mrp }} </p> Discounted Price: <span class="card-text"><i class="fa fa-rupee-sign" aria-hidden="true"></i> {{ $product->mrp=$product->mrp - $product->discount/100*$product->mrp }} </span></li>
        <li class="list-group-item">How much do you like our product : 
            <form action="/home/feedback/{{$product->id}}" method="POST"> 
            @csrf 
            <div class="form-check">
                <input class="form-check-input" type="radio" name="rating" id="rating" value="1" >
                <label class="form-check-label" for="exampleRadios1">
                    Poor
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="rating" id="rating" value="2" >
                <label class="form-check-label" for="exampleRadios1">
                    Average
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="rating" id="rating" value="3" >
                <label class="form-check-label" for="exampleRadios1">
                    Good
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="rating" id="rating" value="4" >
                <label class="form-check-label" for="exampleRadios1">
                    Very Good
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="rating" id="rating" value="5" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Excellent
                </label>
            </div>
        </li>
        <li class="list-group-item"><label for="comment">Write us your feedback :</label>
        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea></li>
        <li class="list-group-item"><button class="form-control btn btn-success" type="submit" ><i class="fas fa-star"></i> Submit</button>
        </form>
    </ul>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong> 
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection