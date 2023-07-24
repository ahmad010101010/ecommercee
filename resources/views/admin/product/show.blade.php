@extends('layouts.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="card">
                <div class="card-header">
                    <div class="header_main">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                                    <div class="header_search">
                                        <div class="header_search_content">
                                            <div class="header_search_form_container">
                                                <a href="{{ route('product.index') }}" class="btn btn-danger float-end">Back</a>
                                                    <div class="custom_dropdown">
                                                        <div class="custom_dropdown_list">
                                                             <span class="custom_dropdown_placeholder clc">Product Name: {{ $product->name }}
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

                                        <div class="product_name">{{$product->name}}</div>
                                        <hr class="singleline">
                                        Price
                                        <div> <span class="product_price mr-4 ">Selling price: ${{$product->selling_price}}</span>  Original Price:<strike class=" product_discount">
                                                <span style='color:black'>${{$product->original_price}}<span> </strike> </div>

                                        <hr class="singleline">
                                        Description:
                                        <div> <span class="product_info"> {{$product->description}}<span><br>  </div>
                                        <div>
                                            <hr class="singleline">
                                            Quntity:
                                            <div> <span class="product_info"> {{$product->quntity}}<span><br>  </div>
                                            <div>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
@endsection
