<section class="Category_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>Categories</span>
          </h2>
       </div>
       <div class="row">

        @forelse ( $categories as $category)


        <div class="card m-2 " style="width: 16rem; ">
            <img class="card-img-top p-1 " style="  width: 200px; height: 190px;" src="{{asset('/storage/'.$category->image)}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$category->name}}</h5>
              <p class="card-text">{{$category->description}}</p>
              
              <a  href="{{route('categories-producr',$category->slug)}}" class="btn btn-primary">view Category</a>
            </div>
          </div>

       
        @empty
            <h4>No Category for now</h4>
        @endforelse


    </div>
 </section>


