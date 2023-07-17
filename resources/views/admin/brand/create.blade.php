@extends('layouts.admin')
@section('content')
<div class="main-panel">
    <div class="content-wrapper" >

    <div class="card">
        <div class="card-header">
            <h4>Add brand
                <a href="{{route('brands.index')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>

        <div class="card-body">
            <form action="{{route('brands.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

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
                    <input type="text" name="name" class="form-control" value="{{old('name')}}"/>
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="col-md-6  mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control" value="{{old('slug')}}"/>
                        @error('slug')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="col-md-6  mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" value="{{old('status')}}" />
                        @error('status')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <span>  Check = hiddin , UnCeck = visable </span>
                    </div>


                    <div class="col-md-12  mb-3">
                        <button type="submit" class="btn btn-primary flot-end">Save</button>
                    </div>
                    </div>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection
