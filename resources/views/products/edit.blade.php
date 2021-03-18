@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left ml-2">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right ml-2">
                <a class="btn btn-primary" href="{{ route('products.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.update',$product->id) }}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$product->title}}"  autocomplete="name" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mrp" class="col-md-4 col-form-label text-md-right">{{ __('MRP') }}</label>

                            <div class="col-md-6">
                                <input id="mrp" type="text" class="form-control @error('mrp') is-invalid @enderror" name="mrp" value="{{$product->mrp}}"  autocomplete="name" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="discount" class="col-md-4 col-form-label text-md-right">{{ __('Discount') }}</label>

                            <div class="col-md-6">
                                <input id="discount" type="text" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{$product->discount}}"  autocomplete="name" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$product->description}}"  autocomplete="name" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock') }}</label>

                            <div class="col-md-6">
                                <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{$product->stock}}"  autocomplete="name" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection