@extends('layouts.front')

@section('title')
{{$category->meta_title}}
@endsection

@section('meta_keyword')
{{$category->meta_keyword}}
@endsection

@section('meta_description')
{{$category->meta_description}}
@endsection


@section('content')


<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
            <span>products</span>
          </h2>
       </div>
       <div class="row">

        @forelse ( $products as $product)
        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="" class="option1">
                    Add To Card
                     </a>
                     <a href="{{route('show_product',$product->slug)}}" class="option2">
                     Show Product
                     </a>
                  </div>
               </div>
               <div class="img-box">
                <img src="{{asset('/storage/'.$product->productImages[0]->name)}}"  alt="img"/>
               </div>
               <div class="detail-box">
                  <h5>
                    {{$product->categories->name}}
                  </h5>
                  <h6>
                   ${{$product->selling_price}}
                  </h6>
                  <h6>
                    ${{$product->original_price}}
                  </h6>
               </div>
            </div>
         </div>

        @empty
            <h4>No product for {{$category->name}}</h4>
        @endforelse


    </div>
 </section>



@endsection
