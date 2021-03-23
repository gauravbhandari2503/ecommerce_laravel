@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="pull-left">
                <h2>All Products </h2>
            </div>
            <div>
                <a class="btn btn-success" href="{{ route('products.create')}}">Add a product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    @if ($message = Session::get('delete'))
        <div class="alert alert-danger">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-striped table-secondary table-sm mt-3">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>MRP</th>
            <th>Discount</th>
            <th>Description</th>
            <th>Stock</th>
            <th>Options</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->mrp }}</td>
                <td>{{ $product->discount }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                        <a href="{{ route('products.show',$product->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('products.edit',$product->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}

@endsection