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
    
    <tr>
	    <td>
            <figure class="media">
	        <div class="img-wrap"><img src="http://bootstrap-ecommerce.com/main/images/items/2.jpg" class="img-thumbnail img-sm"></div>
	        <figcaption class="media-body">
		    <h6 class="title text-truncate">Product name goes here </h6>
		        <dl class="param param-inline small">
                    <dt>Size: </dt>
                    <dd>XXL</dd>
		        </dl>
		        <dl class="param param-inline small">
                    <dt>Color: </dt>
                    <dd>Orange color</dd>
		        </dl>
	        </figcaption>
            </figure> 
	    </td>
	    <td> 
		    <input type="text" class="form-control" disabled value="">
	    </td>
	    <td> 
            <div class="price-wrap"> 
                <var class="price"><i class="fa fa-rupee-sign" aria-hidden="true"></i> 145</var> 
            </div> <!-- price-wrap .// -->
	    </td>
	    <td class="text-right"> 
            <a title="" href="" class="btn btn-outline-success" data-toggle="tooltip" data-original-title="Save to Wishlist"> <i class="fa fa-heart"></i></a> 
            <a href="" class="btn btn-outline-danger"> × Remove</a>
	    </td>
    </tr>
    
    </tbody>
    </table>
    </div> <!-- card.// -->
</div> 
@endsection