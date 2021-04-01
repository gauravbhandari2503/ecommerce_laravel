@extends('layouts.customer')
@section('content')
  <!-- Page Content -->
  <div class="container mt-4">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">RubiCart Shop</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="/storage/Banner/banner2.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="/storage/Banner/banner2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="/storage/Banner/banner2.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
            @foreach($categories as $category)
            @if($category->children)
                @foreach($category->children as $childCategory )
                  @include('partials/subcategory', ['category' => $childCategory])
                @endforeach
            @endif
            @foreach ( $category->products as $item )
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                <a href="{{ route('items.show',$item->id) }}"><img class="card-img-top " src="/storage/products/{{ $item->image }}" alt="" ></a>
                <div class="card-body">
                    <h4 class="card-title">
                    <a class="badge badge-dark" href="{{ route('items.show',$item->id) }}">{{ $item->title }} </a>
                    </h4>
                    <p class="card-text" style="text-decoration:line-through;"><i class="fa fa-rupee-sign" aria-hidden="true"></i>{{ $item->mrp }} </p> <span class="card-text"><i class="fa fa-rupee-sign" aria-hidden="true"></i>{{ $item->mrp=$item->mrp - $item->discount/100*$item->mrp }} </span>
                    <p class="card-text">{{ $item->description }}</p>
                </div>
            <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
            </div>
            </div>
            @endforeach
            @endforeach
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->
      
    </div>
    <!-- /.row -->
    
  </div>
  <!-- /.container -->
  
@endsection