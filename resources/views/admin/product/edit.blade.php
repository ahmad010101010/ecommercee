@extends('layouts.admin')
@section('content')
<div class="main-panel">
    <div class="content-wrapper" >

    <div class="card">
        <div class="card-header">
            <h4>Edit product
                <a href="{{route('product.index')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>

        <div class="card-body">
            <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
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
                        </div>

                        <div class="col-md-6  mb-3">
                            <label>Description</label>
                            <input type="text" name="description" value="{{$product->description}}" class="form-control"/>
                            @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                    <div class="col-md-6  mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$product->name}}" class="form-control"/>
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>

                    <div class="col-md-3  mb-3">
                        <label>Original price</label>
                        <input type="number" name="original_price" value="{{$product->original_price}}" class="form-control"/>
                        @error('original_price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="col-md-6  mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" value="{{$product->slug}}" class="form-control"/>
                        @error('slug')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="col-md-3  mb-3">
                        <label>silling price</label>
                        <input type="number" name="selling_price" value="{{$product->selling_price}}" class="form-control"/>
                        @error('selling_price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-3  mb-3">
                        <label>Quantity</label>
                        <input type="number" name="quntity" value="{{$product->quntity}}" class="form-control"/>
                        @error('quntity')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6  mb-3">
                        <label>Add new image</label>
                        <input type="file" name="image[]" multiple class="form-control"/>
                        @if ($product->productImages)

                        <div class="row py-3 shadow-5">
                            <div class="col-12 mb-1">
                              <div class="lightbox">

                              </div>
                            </div>

                            @foreach ($product->productImages as $image )
                            <div class="col-3 mt-1">

                            <img src="{{asset('/storage/'.$image->name)}}"  class="  w-100 border " alt="img"/>
                            <a href="{{route('deleteOneImage',$image->id)}}" class="d-block">Remove</a>
                          </div>

                            @endforeach



                          </div>
                        </div>
                  </div>
                        @else
                        <h4>No image uploded</h4>
                            @endif
                    </div>

                    <div class="col-md-12  mb-3">
                        <label>Status</label>
                        <input type="checkbox"  name="status" {{$product->status =='1'?'checked':''}} />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Popular</label>
                        <input type="checkbox"  name="popular" {{$product->popular =='1'?'checked':''}} />
                    </div>
                    <div class="col-md-12  mb-3">
                    <h4>SEO TAGS</h4>
                    </div>
                    <div class="col-md-12  mb-3">
                        <label>Meta title</label>
                        <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control"/>
                        @error('meta_title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-12  mb-3">
                        <label>Meta keyword</label>
                        <input type="text" name="meta_keyword" value="{{$product->meta_keyword}}" class="form-control"/>
                        @error('meta_keyword')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-12  mb-3">
                        <label>Meta description</label>
                        <input type="text" name="meta_description" value="{{$product->meta_description}}" class="form-control"/>
                        @error('meta_description')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-12  mb-3">
                        <button type="submit" class="btn btn-primary float-end">update</button>
                    </div>
                    </div>

            </form>
        </div>
    </div>

    </div>
</div>








@endsection
