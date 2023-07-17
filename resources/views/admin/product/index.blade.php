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


                    <h4>product
                        <a href="{{ route('product.create') }}" class="btn btn-primary float-end">Add product</a>
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table table-borderd table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Pupular</th>
                                <th>original price</th>
                                <th>selling price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->categories->name }}</td>
                                    <td>{{ $product->status == '1' ? 'Hidden' : 'visible' }}</td>
                                    <td>{{ $product->popular == '1' ? 'Not Popular' : 'popular' }}</td>
                                    <td>{{ $product->original_price }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->quntity }}</td>
                                    {{-- <td>
                            <img src="{{asset('/storage/'.$product->image)}}"/>
                        </td> --}}
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="btn btn-success mx-1 rounded-1">Edit</a>
                                                
                                            <a href="{{ route('product.show', $product->id) }}"
                                                class="btn btn-success mx-1 rounded-1">Show product</a>
                                            <form method="POST"
                                                action="{{ route('product.destroy', $product->id) }}"
                                                onsubmit="return confirm('are you sure')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger mx-1 rounded-1 ">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
