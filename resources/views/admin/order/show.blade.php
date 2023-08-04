@extends('layouts.admin')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
        @if (session('danger'))
        <div class="alert alert-danger">{{session('danger')}}</div>
        @endif
      </div>
      <div class="card-body">

        <a href="{{route('Orders')}}" class="btn btn-danger mx-1 rounded-1">Back</a>

        <table class="table table-borderd table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Order Id</th>
              <th>Product</th>
              <th>Product Id</th>
              <th>Quantity</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orderItem as $Item)
            <tr>
              <td>{{$Item->id}}</td>
              <td>{{$Item->order_id}}</td>
              <td>{{$Item->product->name}}</td>
              <td>{{$Item->product->id}}</td>
              <td>{{$Item->quntity}}</td>
            </tr>
            <?php $orderId = $Item->order_id; ?>
            @endforeach
          </tbody>
        </table>

        <div class="btn btn-group"><a href="{{route('invoice',$orderId)}}" class="btn btn-success mx-1 rounded-1">Show Invoice</a>
            <a href="{{route('invoice_mail',$orderId)}}" class="btn btn-primary mx-1 rounded-1">send ivoice by email</a>
        <form method="POST" action="{{route('OrdersShip',$orderId)}}"onsubmit="return confirm('are you sure')">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-danger mx-1 rounded-1 ">Ship the order</button>
            </form>
      </div>
    </div>
    </div>
  </div>
</div>
@endsection
