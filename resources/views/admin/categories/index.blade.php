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


            <h4>category
                <a href="{{route('categories.create')}}" class="btn btn-primary float-end">Add category</a>
            </h4>
        </div>

        <div class="card-body">
            <table class="table table-borderd table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->status == '1'?'Hidden':'visible'}}</td>
                        <td>
                            <img src="{{asset('/storage/'.$category->image)}}"/>
                        </td>
                        <td>
                            <div class="btn-group">
                            <a href="{{route('categories.edit',$category->id)}}" class="btn btn-success mx-1 rounded-1">Edit</a>
                            <form method="POST" action="{{route('categories.destroy',$category->id)}}"onsubmit="return confirm('are you sure')">
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
