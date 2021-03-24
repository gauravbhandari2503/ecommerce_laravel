@extends('layouts.customer')
@section('content')
<div class="container mt-5">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"># Order ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Order Created At:</th>
      <th scope="col">Order Shipping Date:</th>
      <th scope="col">Current Status</th>
      <th scope="col">Quantity</th>
      <th scope="col">Amount</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>2</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>Form</td>
    </tr>
  </tbody>
</table>
</div>
@endsection