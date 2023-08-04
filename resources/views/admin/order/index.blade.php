@extends('layouts.admin')
@section('content')
<div class="main-panel">
    <div class="content-wrapper" >

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
            <table class="table table-borderd table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Total Price</th>
                        <th>Delivary Status</th>
                        <th>Payed Status</th>
                        <th>Email Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>{{$order->bay_status}}</td>
                        <td>{{$order->email_status== '1'?'Done':'Not send'}}</td>
                        <td>
                            <div class="btn-group">
                            <a href="{{route('showOrderItem',$order->id)}}" class="btn btn-success mx-1 rounded-1">Show Details</a>
                            {{-- <form method="POST"
                            action="{{ route('deleteOrder', $order->id) }}"
                            onsubmit="return confirm('are you sure')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn btn-danger mx-1 rounded-1 ">Delete</button>
                        </form> --}}
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>

</div>
@endsection
