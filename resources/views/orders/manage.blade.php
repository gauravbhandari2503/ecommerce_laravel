@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="pull-left">
                <h2>All Orders </h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-striped table-secondary table-sm mt-3">
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Customer Name</th>
            <th>Order Created At:</th>
            <th>Order Shipping Date:</th>
            <th>Current Status </th> 
            <th>Quantity</th>
            <th>Amount</th>

            <th>Options</th>
        </tr>
        @php 
            $i = 0;
        @endphp
        @foreach ($orders as $order)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $order->product->title }}</td>
                <td>{{ $order->customer->name }}</td>
                <td>{{ $order->created_at }}</td>
                <td>@if($order->shipped_date === NULL) Not Yet  @else {{ $order->shipped_date }} @endif</td>
                <td>@foreach($order->statuses as $name) {{ $name->status }} @endforeach</td>
                <td>{{ $order->quantity}}</td>
    
                <td>{{ $order->amount }}</td>
                <td>
                    <form action="/dashboard/orders/{{ $order->id }}" method="POST">
                        @csrf
                        @if($name->id === 1)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="Placed" value="2">
                            <label class="form-check-label" for="Placed">Placed</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="Shipped" value="3">
                            <label class="form-check-label" for="Shipped">Shipped</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="Completed" value="4" >
                            <label class="form-check-label" for="Completed">Completed</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="Cancelled" value="5" >
                            <label class="form-check-label" for="Cancelled">Cancelled</label>
                        </div>
                        <button type="submit" class="btn btn-info">
                            Update
                        </button>
                        @elseif($name->id === 2)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="Shipped" value="3">
                            <label class="form-check-label" for="Shipped">Shipped</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="Completed" value="4" >
                            <label class="form-check-label" for="Completed">Completed</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="Cancelled" value="5" >
                            <label class="form-check-label" for="Cancelled">Cancelled</label>
                        </div>
                        <button type="submit" class="btn btn-info">
                            Update
                        </button>
                        @elseif($name->id === 3)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="Completed" value="4" >
                            <label class="form-check-label" for="Completed">Completed</label>
                        </div>
                        <button type="submit" class="btn btn-info">
                            Update
                        </button>
                        @elseif($name->id === 4)
                        <a class="btn btn-success">Dispatched</a>
                        @else
                        <a class="btn btn-danger">Cancelled</a>
                        @endif
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection