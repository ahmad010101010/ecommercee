@extends('layouts.front')

@section('title')
    {{ $product->meta_title }}
@endsection

@section('meta_keyword')
    {{ $product->meta_keyword }}
@endsection

@section('meta_description')
    {{ $product->meta_description }}
@endsection

@section('content')


    <div class="card">
        <div class="card-header product_data">
            <div class="header_main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <a href="{{ route('main_page') }}" class="btn btn-danger float-end">Back</a>
                                        <div class="custom_dropdown">
                                            <div class="custom_dropdown_list">
                                                <span class="custom_dropdown_placeholder clc">Product Name:
                                                    {{ $product->name }}
                                                </span>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </header>
            <div class="single_product">
                <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
                    <div class="row">

                        <div class="col-lg-4 order-lg-2 order-1">
                            <div class="ecommerce-gallery" data-mdb-zoom-effect="true" data-mdb-auto-height="true">
                                <div class="row py-3 shadow-5">
                                    <div class="col-12 mb-1">
                                        <div class="lightbox">
                                            <img src="{{ asset('/storage/' . $product->productImages[0]->name) }}"
                                                class="ecommerce-gallery-main-img active w-100" />
                                        </div>
                                    </div>

                                    @foreach ($product->productImages as $image)
                                        <div class="col-3 mt-1">

                                            <img src="{{ asset('/storage/' . $image->name) }}" class="  w-100 border "
                                                alt="img" />
                                        </div>
                                    @endforeach



                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 order-3">
                            <div class="product_description">

                                <div class="product_name">{{ $product->name }}</div>
                                <hr class="singleline">

                                @if ($product->quntity > 0)
                                    <label class="badge-success p-1 text-wrap" style="width: 6rem;">In Stock</label>
                                @else
                                    <label class="badge-danger p-1 text-wrap" style="width: 6rem;">Out Of Stock</label>
                                @endif

                                <hr class="singleline">
                                Brand
                                <div>
                                    <label class="badge-primary p-1 text-wrap"
                                        style="width: 6rem;">{{ $product->brand->name }}</label>
                                </div>
                                <hr class="singleline">



                                Price
                                <div> <span class="product_price mr-4 ">Selling price: ${{ $product->selling_price }}</span>
                                    Original Price:<strike class=" product_discount">
                                        <span style='color:black'>${{ $product->original_price }}<span> </strike> </div>

                                <hr class="singleline">
                                Description:
                                <div> <span class="product_info"> {{ $product->description }}<span><br> </div>
                                    <input type="hidden" value="{{$product->id}}" class="prod_id">
                                <div>
                                    <hr class="singleline">
                                    <label for="Quntity">Quntity</label>
                                        <div class="input-group text-center mb-3" style="width:130px">
                                            <button class="input-group-text decrement-btn">-</button>
                                                <input type="text " name="quntity" class="form-control qty-input text-center" value="1">
                                            <button class="input-group-text increment-btn">+</button>
                                        </div>
                                </div>

                                        <hr class="singleline">
                                        <div class=" btn btn-groub">

                                            <button type="button" class=" btn-success addToCart ">Add To Cart</a>


                                        </div>
                                        <div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endsection


            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script>

            $(document).ready(function(){
                $('.addToCart').click(function(e){
                    e.preventDefault();
                    var product_id =$(this).closest('.product_data').find('.prod_id').val();
                    var product_qty =$(this).closest('.product_data').find('.qty-input').val();

                    $.ajaxSetup({
                    headers : {
                        'X-CSRF-TOKEN' : $('.meta[name="csrf-token"]').attr('content')
                    }
                });
                    $.ajax({
                        metode:"POST",
                        url: '{{ route('addToCart') }}',
                        data:{
                            'product_id':product_id,
                            'product_qty':product_qty,
                        },
                        success:function(response){
                            alert(response.status);
                        }
                    })


                });
            });

            $(document).ready(function(){
                $('.increment-btn').click(function(e){
                    e.preventDefault();

                    var inc_value = $(this).closest('.product_data').find('.qty-input').val();
                    var value = parseInt(inc_value, 10);
                    value = isNaN(value) ? 0 : value;
                    if(value < 10){
                        value++;
                        $(this).closest('.product_data').find('.qty-input').val(value);
                    }
                });
                $('.decrement-btn').click(function(e){
                    e.preventDefault();

                    var dec_value = $(this).closest('.product_data').find('.qty-input').val();

                    var value = parseInt(dec_value, 10);
                    value = isNaN(value) ? 0 : value;
                    if(value > 1){
                        value--;
                        $(this).closest('.product_data').find('.qty-input').val();
                    }
                });
            });


            </script>

