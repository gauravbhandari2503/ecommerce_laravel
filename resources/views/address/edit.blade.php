@extends('layouts.customer')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left ml-2">
                <h2>Edit Address</h2>
            </div>
            <div class="pull-right ml-2">
                <a class="btn btn-primary" href="{{ route('address.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Address Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('address.update',$address->id) }}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{$address->state}}"  autocomplete="name" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{$address->city}}"  autocomplete="name" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pincode" class="col-md-4 col-form-label text-md-right">{{ __('Pincode') }}</label>

                            <div class="col-md-6">
                                <input id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{$address->pincode}}"  autocomplete="name" autofocus >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$address->address}}"  autocomplete="name" autofocus >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="landmark" class="col-md-4 col-form-label text-md-right">{{ __('Landmark') }}</label>

                            <div class="col-md-6">
                                <input id="landmark" type="text" class="form-control @error('landmark') is-invalid @enderror" name="landmark" value="{{$address->landmark}}"  autocomplete="name" autofocus >
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