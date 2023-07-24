@extends('layouts.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="card">
                <div class="card-header">
                    <h4>Add Category
                        <a href="{{ route('product.index') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6  mb-3">
                                <label>selling Price</label>
                                <input type="number" name="selling_price" class="form-control"
                                    value="{{ old('selling_price') }}" />
                                @error('selling_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6  mb-3">
                                <div class="form-group">
                                    <label for="category">category</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">Select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6  mb-3">
                                <label>Original Price</label>
                                <input type="number" name="original_price" class="form-control"
                                    value="{{ old('original_price') }}" />
                                @error('original_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6  mb-3  float-end">
                                <div class="form-group">
                                    <label for="brand">brand</label>
                                    <select class="form-control" name="brand_id" id="brand_id">
                                        <option value="">Select Brand</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6  mb-3">
                                <label>Popular</label>
                                <input type="checkbox" name="popular" value="{{ old('popular') }}" />
                                Checke:Trinding
                            </div>

                                <div class="col-md-6  mb-3">
                                    <label>Slug</label>
                                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" />
                                    @error('slug')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6  mb-3">
                                    <label>Quntity</label>
                                    <input type="number" name="quntity" class="form-control"
                                        value="{{ old('quntity') }}" />
                                    @error('quntity')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6  mb-3">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control"
                                        value="{{ old('description') }}" />
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>




                                <div class="col-md-6  mb-3">
                                    <label>product x bv Image</label>
                                    <input type="file" name="image[]" multiple class="form-control" />
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6  mb-3">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" value="{{ old('status') }}" />
                                    Checke:Hidden
                                </div>


                                <div class="col-md-12  mb-3">
                                    <h4>SEO TAGS</h4>
                                </div>

                                <div class="col-md-12  mb-3">
                                    <label>Meta title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ old('meta_title') }}" />
                                    @error('meta_title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12  mb-3">
                                    <label>Meta keyword</label>
                                    <input type="text" name="meta_keyword" class="form-control"
                                        value="{{ old('meta_keyword') }}" />
                                    @error('meta_keyword')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12  mb-3">
                                    <label>Meta description</label>
                                    <input type="text" name="meta_description" class="form-control"
                                        value="{{ old('meta_description') }}" />
                                    @error('meta_description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>



                            </div>
                            <div class="col-md-6  mb-3">
                                <button type="submit" class="btn btn-primary float-end">Save</button>
                            </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function() {
        $('#category_id').on('change', function() {
            var category_id = $(this).val();
            $.ajax({
                url: '{{ route('getPrands') }}',
                type: 'GET',
                data: {
                    category_id: category_id
                },
                success: function(response) {
                    var brands = response;

                    // قم بتحديث خيارات الـ prand
                    $('#brand_id').empty();
                    $.each(brands, function(key, value) {
                        $('#brand_id').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
