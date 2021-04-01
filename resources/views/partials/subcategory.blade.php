@if($category->children)
    @foreach ($category->children as $childCategory)      
        @include('partials/subcategory', ['category' => $childCategory])
    @endforeach
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
@endif