<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html"><img width="250" src="{{asset('images/logo.png')}}" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{route('main_page')}}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item ">
                   <a class="nav-link " href="{{route('categories')}}" > <span class="nav-label"> Categories <span class="caret"></span></a>

                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{route('products')}}"> Products </a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="contact.html">Contact</a>
                </li>

                <form class="form-inline">
                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>

        <li class="nav-item">
                @if (Route::has('login'))
                <div class="b">
                    @auth
                    <a class="nav-item btn btn-danger "
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary ">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-success ">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </li>

             </ul>
          </div>
       </nav>
    </div>
 </header>
 <!-- end header section -->

