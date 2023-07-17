@extends('layouts.admin')
@section('content')
<div class="main-panel">
    <div class="content-wrapper" >

    <div class="card">
        <div class="card-header">
            <h4>Edit brand
                <a href="{{route('brands.index')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>

        <div class="card-body">
            <form action="{{route('brands.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class=" row">
                    <div class="col-md-6  mb-3">
                        <label>Categories</label>
                        <select name="category_id" >
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>

                    <div class="col-md-6  mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$brand->name}}" class="form-control"/>
                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6  mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" value="{{$brand->slug}}" class="form-control"/>
                        @error('slug')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="col-md-6  mb-3">
                        <label>Status</label>
                        <input type="checkbox"  name="status" {{$brand->status =='1'?'checked':''}} />
                        @error('status')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                        <button type="submit" class="btn btn-primary flot-end">update</button>
                    </div>
                    </div>
            </form>
        </div>
    </div>

    </div>
</div>
@endsection
