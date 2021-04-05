@extends('layouts.customer')

@section('content')
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="pull-left">
                <h2>All addresses </h2>
            </div>
            <div>
                <a class="btn btn-success" href="{{ route('address.create')}}">Add a address</a>
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
            <th>State</th>
            <th>City</th>
            <th>pincode</th>
            <th>Address</th>
            <th>landmark</th>
            <th>Options</th>
        </tr>
        @foreach ($addresses as $address)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $address->state }}</td>
                <td>{{ $address->city }}</td>
                <td>{{ $address->pincode }}</td>
                <td>{{ $address->address }}</td>
                <td>{{ $address->landmark }}</td>
                <td>
                    <form action="{{ route('address.destroy',$address->id) }}" method="POST">

                        <a href="{{ route('address.show',$address->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('address.edit',$address->id) }}">
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

    {!! $addresses->links() !!}

@endsection