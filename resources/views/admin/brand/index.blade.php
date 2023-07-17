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


            <h4>brand
                <a href="{{route('brands.create')}}" class="btn btn-primary float-end">Add brand</a>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                    <tr>
                        <td>{{$brand->id}}</td>
                        <td>{{$brand->name}}</td>
                        <td>{{$brand->category->name}}</td>
                        <td>{{$brand->status == '1'?'Hidden':'visible'}}</td>
                        <td>
                            <div class="btn-group">
                            <a href="{{route('brands.edit',$brand->id)}}" class="btn btn-success mx-1 rounded-1">Edit</a>
                            <form method="POST" action="{{route('brands.destroy',$brand->id)}}"onsubmit="return confirm('are you sure')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-1 rounded-1 ">Delete</button>
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
