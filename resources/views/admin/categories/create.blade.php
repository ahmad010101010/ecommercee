@extends('layouts.admin')
@section('content')
<div class="main-panel">
    <div class="content-wrapper" >

    <div class="card">
        <div class="card-header">
            <h4>Add Category
                <a href="{{route('categories.index')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>

        <div class="card-body">
            <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class=" row">

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
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" value="{{old('description')}}"/>
                        @error('description')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6  mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" value="{{old('image')}}"/>
                        @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6  mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" value="{{old('status')}}" />
                        @error('status')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-12  mb-3">
                    <h4>SEO TAGS</h4>
                    </div>

                    <div class="col-md-12  mb-3">
                        <label>Meta title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{old('meta_title')}}"/>
                        @error('meta_title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-12  mb-3">
                        <label>Meta keyword</label>
                        <input type="text" name="meta_keyword" class="form-control" value="{{old('meta_keyword')}}"/>
                        @error('meta_keyword')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-12  mb-3">
                        <label>Meta description</label>
                        <input type="text" name="meta_description" class="form-control" value="{{old('meta_description')}}"/>
                        @error('meta_description')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
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
