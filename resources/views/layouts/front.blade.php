<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->

        <meta name="keywords" content="@yield('meta_keyword')" />
        <meta name="description" content="@yield('meta_description')" />
        <meta name="author" content="ALyousif Ecommerce" />

        <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">
        <title>@yield('title')</title>
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('front_end/css/bootstrap.css') }}" />
        <!-- font awesome style -->
        <link href="{{ asset('front_end/css/font-awesome.min.css')}}" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="{{asset('front_end/css/style.css')}}" rel="stylesheet" />
        <!-- responsive style -->
        <link href="{{asset('front_end/css/responsive.css')}}" rel="stylesheet" />
    </head>


    <body>
        <div class="hero_area">


@include('layouts.inc.front_end.header')

@yield('content')

@include('layouts.inc.front_end.footer')






<div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

       Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

    </p>
 </div>
 <!-- jQery -->
 <script src="{{asset('front_end/js/jquery-3.4.1.min.js')}}"></script>
 <!-- popper js -->
 <script src="{{asset('front_end/js/popper.min.js')}}"></script>
 <!-- bootstrap js -->
 <script src="{{asset('front_end/js/bootstrap.js')}}"></script>
 <!-- custom js -->
 <script src="{{asset('front_end/js/custom.js')}}"></script>

</body>
</html>
