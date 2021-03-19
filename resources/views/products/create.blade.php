@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
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
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:50px" name="description"
                        placeholder="Enter Description"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stock:</strong>
                    <input type="number" name="stock" class="form-control" placeholder="Enter Available Stock Of Product">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>MRP:</strong>
                    <input type="number" name="mrp" class="form-control" placeholder="Enter Product Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Discount %:</strong>
                    <input type="number" name="discount" class="form-control" placeholder="Enter Discount On Product">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category :</strong>
                    <select name="category" id="category" class="form-control browser-default custom-select">
                        <option value="">--Select any category--</option>
                        @foreach($categories as $item)
                        <option value='{{$item->id}}'>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Subcategory :</strong>
                    <select name="subcategory" id="subcategory" class="form-control browser-default custom-select ">
                        
                    </select>
                </div>
            </div>

            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>

    </form>
    <script type="text/javascript">
    $(document).ready(function () {
        $('#category').on('change',function(e) {
        var cat_id = e.target.value;
        $.ajax({
            url:"{{ route('subcat') }}",
            type:"POST",
            data: {
                "_token": "{{ csrf_token() }}",
                cat_id: cat_id
            },
        success:function (data) {
            $('#subcategory').empty();
            $.each(data.subcategories[0].child,function(index,child){
            $('#subcategory').append('<option value="'+child.id+'">'+child.name+'</option>');
            })
            }
        })
    });
    });
</script>
@endsection