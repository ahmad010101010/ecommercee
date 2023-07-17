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
                                                <form action="#" class="header_search_form clearfix">
                                                    <div class="custom_dropdown">

                                                        <div class="custom_dropdown_list">
                                                             <span class="custom_dropdown_placeholder clc">{{ $product->name }}
                                                                <a href="{{ route('product.index') }}" class="btn btn-danger float-end">Back</a>

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

                                        <div class="product_name">Acer Aspire 3 Celeron Dual Core - (2 GB/500 GB HDD/Windows
                                            10 Home) A315-33 Laptop (15.6 inch, Black, 2.1 kg)</div>
                                        <div class="product-rating"><span class="badge badge-success"><i
                                                    class="fa fa-star"></i> 4.5 Star</span> <span class="rating-review">35
                                                Ratings & 45 Reviews</span></div>
                                        <div> <span class="product_price">₹ 29,000</span> <strike class="product_discount">
                                                <span style='color:black'>₹ 2,000<span> </strike> </div>
                                        <div> <span class="product_saved">You Saved:</span> <span style='color:black'>₹
                                                2,000<span> </div>
                                        <hr class="singleline">
                                        <div> <span class="product_info">EMI starts at ₹ 2,000. No Cost EMI
                                                Available<span><br> <span class="product_info">Warranty: 6 months
                                                        warranty<span><br> <span class="product_info">7 Days easy return
                                                                policy<span><br> <span class="product_info">7 Days easy
                                                                        return policy<span><br> <span
                                                                                class="product_info">In Stock: 25 units sold
                                                                                this week<span> </div>
                                        <div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="br-dashed">
                                                        <div class="row">
                                                            <div class="col-md-3 col-xs-3"> <img
                                                                    src="https://img.icons8.com/color/48/000000/price-tag.png">
                                                            </div>
                                                            <div class="col-md-9 col-xs-9">
                                                                <div class="pr-info"> <span class="break-all">Get 5% instant
                                                                        discount + 10X rewards @ RENTOPC</span> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7"> </div>
                                            </div>
                                            <div class="row" style="margin-top: 15px;">
                                                <div class="col-xs-6" style="margin-left: 15px;"> <span
                                                        class="product_options">RAM Options</span><br> <button
                                                        class="btn btn-primary btn-sm">4 GB</button> <button
                                                        class="btn btn-primary btn-sm">8 GB</button> <button
                                                        class="btn btn-primary btn-sm">16 GB</button> </div>
                                                <div class="col-xs-6" style="margin-left: 55px;"> <span
                                                        class="product_options">Storage Options</span><br> <button
                                                        class="btn btn-primary btn-sm">500 GB</button> <button
                                                        class="btn btn-primary btn-sm">1 TB</button> </div>
                                            </div>
                                        </div>
                                        <hr class="singleline">
                                        <div class="order_info d-flex flex-row">
                                            <form action="#">
                                        </div>
                                        <div class="row">

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
    </div>
@endsection
