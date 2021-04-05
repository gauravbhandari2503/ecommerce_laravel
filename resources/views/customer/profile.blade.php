@extends('layouts.customer')
@section('content')
<div class="container emp-profile mt-5 bg-primary text-white" >
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img mt-5 ml-4">
                <img class="rounded-circle img-fluid" src="/storage/avatars/{{ $userInfo->avatar }}" alt=""/>
                <form action="{{ route('profile.image') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="avatar">Change Profile</label>
                        <input type="file" class="form-control-file" id="avatar" name="avatar">
                    </div>
                    <input type="submit" class="btn btn-success mb-2" value="Change">
                    <a class="btn btn-warning mb-2" href="{{ url('/home/profile/address') }}">Add address</a> 
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head mt-2">
                        <h5>
                            {{ $userInfo->name }}
                        </h5>
                        <h6>
                            {{ $userInfo->email }}
                        </h6>
                        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                    </li>
                </ul>
                <div>
                <div class="row mt-2">
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="font-weight-bold">User Id</label>
                                    </div>
                                <div class="col-md-6">
                                    <p>{{ $userInfo->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $userInfo->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $userInfo->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $userInfo->contact }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">Role</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Buyer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
<div class="container ">
@if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif   
    @if(session()->has('message'))
        <div class="alert alert-success mt-3">
            <p>{{session()->get('message')}}</p>
        </div>
    @endif       
</div>
@endsection