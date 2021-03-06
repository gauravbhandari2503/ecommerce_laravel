@extends('layouts.customer')
@section('content')
  <!-- Page Content -->
  <div class="container-fluid mt-4">

    <div class="row">

      
      <!-- /.col-lg-3 -->

      <div class="col-lg-12">

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
            @foreach($items as $item)
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
                    @php
                      if($item->reviews->first())
                      {
                        $count = 0;
                        $rating = 0;
                        $average = 0;
                        foreach($item->reviews as $review){
                          $rating += $review->rating;
                          $count = $count + 1 ;
                        }
                        $average = ceil($rating / $count);
                      }
                      else{
                       $average = 1;
                      }
                    @endphp
                    <div class="card-footer">
                      <small class="text-muted">
                      @for($i=1;$i<=5;$i++)
                        @if($i<=$average)
                        &#9733;
                        @else
                        &#9734;
                        @endif
                      @endfor
                      </small>
                      @if($item->total_orders >= '2')
                        <span class="badge badge-pill badge-primary float-right">Best Seller <i class="fas fa-flag"></i> </span>
                      @endif
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
        {!! $items->links() !!}
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->
      
    </div>
    <!-- /.row -->
    
  </div>
  <!-- /.container -->
  
@endsection