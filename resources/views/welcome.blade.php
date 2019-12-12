<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Street Hawker</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="{{asset('frontEnd/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/sass/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/css/style.css')}}">
</head>

<body>
    <header>
        <!--Topbar start here-->
        <div id="topbar">
            <div class="container">
                <div class="row">
                    <div class="support col-md-6">
                        <div class="icon">
                            <i class="fa fa-headphones" aria-hidden="true"></i>
                        </div>
                        <div class="phone">
                            <span>For more information call</span>
                            <span>+8801712-345678</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="log-in">



                                        @guest
                                                    <form method="POST" action="{{ route('login') }}">
                                                            @csrf
                                                                {{-- <input type="text" placeholder="Email/Phone"> --}}
                                                                <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                {{-- <input type="password" placeholder="Password"> --}}
                                                                <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                                                @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                <button>Sign In</button>
                                                        </form>

                                        @else

                                        <div class="btn-group">
                                                <a class="btn btn-outline-secondary" href="{{ url('/home') }}">Home</a>

                                                <div class="" >
                                                        <a class="btn btn-outline-secondary" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                </div>
                                                {{-- <button type="button" class="btn btn-secondary">Left</button> --}}
                                                {{-- <button type="button" class="btn btn-secondary">Middle</button> --}}
                                                {{-- <button type="button" class="btn btn-secondary">Right</button> --}}
                                        </div>
                                        @endguest



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Topbar end here-->
        <!--navbar start here-->
        <div id="navbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <img src="{{asset('frontEnd/img/Logo.png')}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <form action="">
                                <input type="text" placeholder="Search">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class=" cart col-md-3">
                        <span>Shopping Cart</span>
                        <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!--navbar end here-->
    </header>
    <!--Banner start here-->
    <div id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="#"><img src="{{asset('frontEnd/img/id-20-slide-1.jpg')}}" alt=""></a>
                            </div>
                            <div class="carousel-item">
                                <a href="#"><img src="{{asset('frontEnd/img/id-20-slide-2.jpg')}}" alt=""></a>
                            </div>
                            <div class="carousel-item">
                                <a href="#"><img src="{{asset('frontEnd/img/id-20-slide-3.jpg')}}" alt=""></a>
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="banner-ad">
                                <img src="{{asset('frontEnd/img/id-20-banner-1.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="banner-ad">
                                <img src="{{asset('frontEnd/img/id-20-banner-2.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="banner-ad">
                                <img src="{{asset('frontEnd/img/id-20-banner-3.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--service start here-->
    <div id="service">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="sv-inner">
                        <div class="sv-icon">
                            <img src="{{asset('frontEnd/img/shipping-1.png')}}" alt="">
                        </div>
                        <div class="sv-info">
                            <h2>free shipping</h2>
                            <p>Free shipping on all UK oders</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="sv-inner">
                        <div class="sv-icon">
                            <img src="{{asset('frontEnd/img/return-1.png')}}" alt="">
                        </div>
                        <div class="sv-info">
                            <h2>Money Guarantee</h2>
                            <p>30 days money back guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="sv-inner">
                        <div class="sv-icon">
                            <img src="{{asset('frontEnd/img/safe-1.png')}}" alt="">
                        </div>
                        <div class="sv-info">
                            <h2>safe shopping</h2>
                            <p>Safe shopping guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="sv-inner">
                        <div class="sv-icon">
                            <img src="{{asset('frontEnd/img/support-1.png')}}" alt="">
                        </div>
                        <div class="sv-info">
                            <h2>online support</h2>
                            <p>We support online 24/7 on day</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--service end here-->
    <!--count start here-->
    <div id="count">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="leftsidead">
                        <img src="{{asset('frontEnd/img/id-20-banner-4.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-9 col-md-6">
                    <div class="deals">
                        <div class="block-content clearfix">
                            <div class="thumbnail">
                                <div class="thumb-img active">
                                    <img src="{{asset('frontEnd/img/07_4.jpg')}}" alt="">
                                </div>
                                <div class="thumb-img">
                                    <img src="{{asset('frontEnd/img/08_4.jpg')}}" alt="">
                                </div>
                                <div class="thumb-img">
                                    <img src="{{asset('frontEnd/img/google_pixel_android_8.1_opm_2.jpg')}}" alt="">
                                </div>
                                <div class="thumb-img">
                                    <img src="{{asset('frontEnd/img/04_13.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="grid-sys">
                                <div id="sys-1">
                                    <div class="item-inner clearfix">
                                        <div class="box-img">
                                            <a href="#">
                                                <img src="{{asset('frontEnd/img/count-image.jpg')}}" alt="">
                                            </a>
                                            <div class="product-overlay">
                                                <div class="opt">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                    <i class="fa fa-random" aria-hidden="true"></i>
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </div>
                                                <div class="add-cart">
                                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                    <span>Add to Cart</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-details">
                                            <div class="product-name">
                                                <h2><a href="#">Gants Striker 2 Revit Mcom</a></h2>
                                            </div>
                                            <div class="product-des">
                                                Dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue
                                            </div>
                                            <div class="product-review">
                                                <div class="rating" title="100%">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <span class="offer-price">
                                                    <span class="price">$68.00</span>
                                                </span>
                                                <span class="old-price">
                                                    <span class="price">$72.00</span>
                                                </span>
                                            </div>
                                            <div id="clock">

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
    </div>
    <!--count end here-->
    <!--category start here-->
    <div id="category">
        <div class="container">
            <div class="row">
                <div class="cat-innerr">
                    <div class="cat-title">
                        <h2>Popular Categories</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="cat-img">
                                <a href="#"><img src="{{asset('frontEnd/img/id-20-cat-1.jpg')}}" alt="Fashion Kids"></a>
                            </div>
                            <div class="cat-link color-1">
                                <a href="#">Fashion</a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="cat-img">
                                <a href="#"><img src="{{asset('frontEnd/img/id-20-cat-2.jpg')}}" alt="SmartPhone"></a>
                            </div>
                            <div class="cat-link color-2">
                                <a href="#">Smartphone</a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="cat-img">
                                <a href="#"><img src="{{asset('frontEnd/img/id-20-cat-3.jpg')}}" alt="Bag & Backpack"></a>
                            </div>
                            <div class="cat-link color-3">
                                <a href="#">Bag & Backpack</a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="cat-img">
                                <a href="#"><img src="{{asset('frontEnd/img/id-20-cat-4.jpg')}}" alt="Baby & Mom"></a>
                            </div>
                            <div class="cat-link color-4">
                                <a href="#">Baby & Mom</a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="cat-img">
                                <a href="#"><img src="{{asset('frontEnd/img/id-20-cat-5.jpg')}}" alt="Food & organic"></a>
                            </div>
                            <div class="cat-link color-5">
                                <a href="#">Food & Organic</a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="cat-img">
                                <a href="#"><img src="{{asset('frontEnd/img/id-20-cat-6.jpg')}}" alt="Furniture"></a>
                            </div>
                            <div class="cat-link color-6">
                                <a href="#">Furniture</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--category end here-->
    <!--product start here-->
    <div id="product-row">
        <div class="container">
            <div class="cat-tab-product pdcolor-1">
                <div class="col-category">
                    <div class="item">
                        <div class="content-box">
                            <div class="parent-cat">
                                <div class="img-cat">
                                    <img src="{{asset('frontEnd/img/icon-electronic.png')}}" alt="">
                                </div>
                                <div class="cat-title">
                                    <a href="#">electronics</a>
                                </div>
                            </div>
                            <ul class="sub-cat">
                                <li><a href="#">TV & Video</a></li>
                                <li><a href="#">Home Audio & Theater</a></li>
                                <li><a href="#">Headphones</a></li>
                                <li><a href="#">Car Electronics</a></li>
                                <li><a href="#">Musical Instruments</a></li>
                                <li><a href="#">Monitor</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Drives & Storage</a></li>
                                <li><a href="#">Printeres & Ink</a></li>
                                <li><a href="#">Electronics Showcase</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-products">
                    <div class="listingtab">
                        <!-- tab pills -->
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#new-product">new product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#toprating">top rating</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#mostselling">most selling</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane container active" id="new-product">
                                <div class="product-slide ">
                                    <div class="items">
                                        <img src="{{asset('frontEnd/img/iphone_6s_plus_red_case_2.jpg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="toprating">...</div>
                            <div class="tab-pane container fade" id="mostselling">...</div>
                        </div>
                    </div>
                    <div class="banner-ad">
                        <a href="#" class="banner">
                            <img src="{{asset('frontEnd/img/electronic-banner.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>


            <div class="cat-tab-product pdcolor-2">
                <div class="col-category">
                    <div class="item">
                        <div class="content-box">
                            <div class="parent-cat">
                                <div class="img-cat">
                                    <img src="{{asset('frontEnd/img/icon-electronic.png')}}" alt="">
                                </div>
                                <div class="cat-title">
                                    <a href="#">electronics</a>
                                </div>
                            </div>
                            <ul class="sub-cat">
                                <li><a href="#">TV & Video</a></li>
                                <li><a href="#">Home Audio & Theater</a></li>
                                <li><a href="#">Headphones</a></li>
                                <li><a href="#">Car Electronics</a></li>
                                <li><a href="#">Musical Instruments</a></li>
                                <li><a href="#">Monitor</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Drives & Storage</a></li>
                                <li><a href="#">Printeres & Ink</a></li>
                                <li><a href="#">Electronics Showcase</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-products">
                    <div class="listingtab">
                        <!-- tab pills -->
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#new-product">new product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#toprating">top rating</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#mostselling">most selling</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane container active" id="new-product">
                                <div class="product-slide ">
                                    <div class="items">
                                        <img src="{{asset('frontEnd/img/iphone_6s_plus_red_case_2.jpg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="toprating">...</div>
                            <div class="tab-pane container fade" id="mostselling">...</div>
                        </div>
                    </div>
                    <div class="banner-ad">
                        <a href="#" class="banner">
                            <img src="{{asset('frontEnd/img/fashion-banner.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>


            <div class="cat-tab-product pdcolor-3">
                <div class="col-category">
                    <div class="item">
                        <div class="content-box">
                            <div class="parent-cat">
                                <div class="img-cat">
                                    <img src="{{asset('frontEnd/img/icon-electronic.png')}}" alt="">
                                </div>
                                <div class="cat-title">
                                    <a href="#">electronics</a>
                                </div>
                            </div>
                            <ul class="sub-cat">
                                <li><a href="#">TV & Video</a></li>
                                <li><a href="#">Home Audio & Theater</a></li>
                                <li><a href="#">Headphones</a></li>
                                <li><a href="#">Car Electronics</a></li>
                                <li><a href="#">Musical Instruments</a></li>
                                <li><a href="#">Monitor</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Drives & Storage</a></li>
                                <li><a href="#">Printeres & Ink</a></li>
                                <li><a href="#">Electronics Showcase</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-products">
                    <div class="listingtab">
                        <!-- tab pills -->
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#new-product">new product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#toprating">top rating</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#mostselling">most selling</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane container active" id="new-product">
                                <div class="product-slide ">
                                    <div class="items">
                                        <img src="{{asset('frontEnd/img/iphone_6s_plus_red_case_2.jpg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="toprating">...</div>
                            <div class="tab-pane container fade" id="mostselling">...</div>
                        </div>
                    </div>
                    <div class="banner-ad">
                        <a href="#" class="banner">
                            <img src="{{asset('frontEnd/img/furniture-banner.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>


            <div class="cat-tab-product pdcolor-4">
                <div class="col-category">
                    <div class="item">
                        <div class="content-box">
                            <div class="parent-cat">
                                <div class="img-cat">
                                    <img src="{{asset('frontEnd/img/icon-electronic.png')}}" alt="">
                                </div>
                                <div class="cat-title">
                                    <a href="#">electronics</a>
                                </div>
                            </div>
                            <ul class="sub-cat">
                                <li><a href="#">TV & Video</a></li>
                                <li><a href="#">Home Audio & Theater</a></li>
                                <li><a href="#">Headphones</a></li>
                                <li><a href="#">Car Electronics</a></li>
                                <li><a href="#">Musical Instruments</a></li>
                                <li><a href="#">Monitor</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Drives & Storage</a></li>
                                <li><a href="#">Printeres & Ink</a></li>
                                <li><a href="#">Electronics Showcase</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-products">
                    <div class="listingtab">
                        <!-- tab pills -->
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#new-product">new product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#toprating">top rating</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#mostselling">most selling</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane container active" id="new-product">
                                <div class="product-slide ">
                                    <div class="items">
                                        <img src="{{asset('frontEnd/img/iphone_6s_plus_red_case_2.jpg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="toprating">...</div>
                            <div class="tab-pane container fade" id="mostselling">...</div>
                        </div>
                    </div>
                    <div class="banner-ad">
                        <a href="#" class="banner">
                            <img src="{{asset('frontEnd/img/toys-banner.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product end here-->
    <!--filter product start here-->
    <div id="filterproduct">
        <div class="container">
            <div class="row">
                <div class="filterinner">
                    <div class="filter-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="filter-items">
                        <div class="filter-item">
                            <div class="flp-img">
                                <a href="#"><img src="{{asset('frontEnd/img/funiture_6_2.jpg')}}" alt=""></a>
                            </div>
                            <div class="flp-des">
                                <div class="flp-title">
                                    <a>Clocky Alarm Clock On Wheels</a>
                                </div>
                                <div class="flp-review">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="flp-price">
                                    <span>$452.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="filter-item col-md-4">
                            <div class="flp-img">
                                <a href="#"><img src="{{asset('frontEnd/img/fashion_2_1.jpg')}}" alt=""></a>
                            </div>
                            <div class="flp-des">
                                <div class="flp-title">
                                    <a>Color Block Long Sleeve Bodycon</a>
                                </div>
                                <div class="flp-review">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="flp-price">
                                    <span>$253.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="filter-item col-md-4">
                            <div class="flp-img">
                                <a href="#"><img src="{{asset('frontEnd/img/4_9.jpg')}}" alt=""></a>
                            </div>
                            <div class="flp-des">
                                <div class="flp-title">
                                    <a>Color You Talking Hamster Repeats</a>
                                </div>
                                <div class="flp-review">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="flp-price">
                                    <span>$112.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="filter-item col-md-4">
                            <div class="flp-img">
                                <a href="#"><img src="{{asset('frontEnd/img/8_6.jpg')}}" alt=""></a>
                            </div>
                            <div class="flp-des">
                                <div class="flp-title">
                                    <a>Gund Sesame Street Take Along</a>
                                </div>
                                <div class="flp-review">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="flp-price">
                                    <span>$520.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="filter-item col-md-4">
                            <div class="flp-img">
                                <a href="#"><img src="{{asset('frontEnd/img/10_5.jpg')}}" alt=""></a>
                            </div>
                            <div class="flp-des">
                                <div class="flp-title">
                                    <a>Munchkin White Hot Inflatable Tub</a>
                                </div>
                                <div class="flp-review">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="flp-price">
                                    <span>$650.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="filter-item col-md-4">
                            <div class="flp-img">
                                <a href="#"><img src="{{asset('frontEnd/img/funiture_2_2.jpg')}}" alt=""></a>
                            </div>
                            <div class="flp-des">
                                <div class="flp-title">
                                    <a>Plywood Lounge Chair in Natural</a>
                                </div>
                                <div class="flp-review">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="flp-price">
                                    <span>$220.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="brand">
                    <a href="#"><img src="{{asset('frontEnd/img/brand-20-1.jpg')}}" alt=""></a>
                    <a href="#"><img src="{{asset('frontEnd/img/brand-20-2.jpg')}}" alt=""></a>
                    <a href="#"><img src="{{asset('frontEnd/img/brand-20-3.jpg')}}" alt=""></a>
                    <a href="#"><img src="{{asset('frontEnd/img/brand-20-4.jpg')}}" alt=""></a>
                    <a href="#"><img src="{{asset('frontEnd/img/brand-20-5.jpg')}}" alt=""></a>
                    <a href="#"><img src="{{asset('frontEnd/img/brand-20-6.jpg')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!--filter product end here-->
    <div id="newsletter">
        <div class="container">
            <div class="news-title">
                <div class="news-icon">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </div>
                <div class="news-text">
                    <h2>Sign up for newsletter <br><span>& Receive 15% Off Your Order</span></h2>
                </div>
            </div>
            <div class="news-input">
                <form action="">
                    <input type="text" placeholder="Your email address">
                    <button>subscribe</button>
                </form>
            </div>
        </div>
    </div>


    <!--script code here-->
    <script src="{{asset('frontEnd/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/wow.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/countdown.js')}}"></script>
    <script src="{{asset('frontEnd/https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js')}}" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {

            $('#clock').countdown('2020/10/10').on('update.countdown', function(event) {
                var $this = $(this).html(event.strftime('' +
                    '<div><span>%-w</span> Week%!w </div>' +
                    '<div><span>%-d</span> Day%!d</div> ' +
                    '<div><span>%H</span> Hour </div>' +
                    '<div><span>%M</span> Min</div> ' +
                    '<div><span>%S</span> Sec</div>'));
            });



        });
    </script>
</body>

</html>
