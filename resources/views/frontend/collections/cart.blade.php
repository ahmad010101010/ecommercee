@extends('layouts.front')

@section('title')
    My Cart
@endsection


@section('content')

<div class="container my-5">
    <div class="card shadow ">


<div class="card-body">
    <table class="table table-borderd table-striped">
        <thead>
            <tr>
                <th>Quntity</th>
                <th>price</th>
                <th>image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $total=0; @endphp
            @forelse ($carts as $cart)


            <tr>
                <td>{{$cart->product_qty}}</td>
                <td> $ {{$cart->cartProduct->selling_price}}</td>
                <td>
                    <img src="{{ asset('/storage/' . $cart->cartProduct->productImages[0]->name) }}"/>
                </td>
                <td>

                    <a href="{{route('deleteCarte',$cart)}}" class="btn btn-danger mx-1 rounded-1 ">Delete</a>
                </div>
                </td>
            </tr>
            @php $total += $cart->cartProduct->selling_price*$cart->product_qty; @endphp
            @empty
                    <h3>No Item</h3>
                @endforelse
        </tbody>
    </table>
    <div class="card-footer">
        <h6>total price : $ {{ $total }}</h6>

        <a href="{{ route('stripe',$total) }}" class="btn btn-success float-end">Pay Now</a>
        <a href="{{ route('cashOnDelivary',$total) }}" class="btn btn-success float-end">Cash On Delivary</a>

    </div>
</div>
</div>
@endsection

