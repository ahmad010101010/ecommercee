@extends('layouts.admin')
@section('content')
<div class="main-panel">
    <div class="content-wrapper" >

    <div class="card">
        <div class="card-header">
            <h4>Edit Category
                <a href="{{route('categories.index')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>

        <div class="card-body">
            <form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class=" row">

                    <div class="col-md-6  mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control"/>
                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6  mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" value="{{$category->slug}}" class="form-control"/>
                        @error('slug')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6  mb-3">
                        <label>Description</label>
                        <input type="text" name="description" value="{{$category->description}}" class="form-control"/>
                        @error('description')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6  mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control"/>
                        <img src="{{asset('/storage/'.$category->image)}}" width="60px" height="60px"/>
                        @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6  mb-3">
                        <label>Status</label>
                        <input type="checkbox"  name="status" {{$category->status =='1'?'checked':''}} />
                        @error('status')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-12  mb-3">
                    <h4>SEO TAGS</h4>
                    </div>

                    <div class="col-md-12  mb-3">
                        <label>Meta title</label>
                        <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control"/>
                        @error('meta_title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-12  mb-3">
                        <label>Meta keyword</label>
                        <input type="text" name="meta_keyword" value="{{$category->meta_keyword}}" class="form-control"/>
                        @error('meta_keyword')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-12  mb-3">
                        <label>Meta description</label>
                        <input type="text" name="meta_description" value="{{$category->meta_description}}" class="form-control"/>
                        @error('meta_description')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-12  mb-3">
                        <button type="submit" class="btn btn-primary flot-end">update</button>
                    </div>




                    </div>

            </form>
        </div>
    </div>

    </div>
</div>
@endsection
