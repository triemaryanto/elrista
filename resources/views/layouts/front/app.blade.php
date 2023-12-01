<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="{{ asset('multikart_all_in_one/') }}/assets/images/favicon/2.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('multikart_all_in_one/') }}/assets/images/favicon/2.png" type="image/x-icon">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('multikart_all_in_one/') }}/assets/css/vendors/font-awesome.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('multikart_all_in_one/') }}/assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('multikart_all_in_one/') }}/assets/css/vendors/slick-theme.css">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('multikart_all_in_one/') }}/assets/css/vendors/animate.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('multikart_all_in_one/') }}/assets/css/vendors/themify-icons.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('multikart_all_in_one/') }}/assets/css/vendors/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('multikart_all_in_one/') }}/assets/css/style.css">

</head>

<body class="theme-color-25">


 <!-- Main header -->
 @include('layouts.front.header')
 <!-- /main header -->


    <!-- Home slider -->
    <section class="p-0 height-100 xs-responsive bg-white">
        <div class="home-slider">
            <div>
                <div class="home" id="img-bg">
                    <img src="{{ asset('multikart_all_in_one/') }}/assets/images/home-banner/61.jpg" alt="" class="bg-img blur-up lazyload">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="slider-contain">
                                    <div>
                                        <h4 class="text-white-50">end of season sale</h4>
                                        <h1 class="text-white">upto 50% off</h1>
                                        <a href="#" class="btn btn-solid">explore now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home slider end -->


    <!-- banner section start -->
    <section class="banner-goggles banner-padding bg-white">
        <div class="container-fluid">
            <div class="row partition3">
                <div class="col-md-6 ratio_40">
                    <div class="collection-banner p-right text-center overlay-banner">
                        <div class="img-part">
                            <img src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/banner/49.jpg"
                                class="img-fluid blur-up lazyload bg-img" alt="">
                        </div>
                        <div class="contain-banner banner-3">
                            <div>
                                <h4 class="text-white">sweaters & sweatshirts</h4>
                                <h2 class="mb-2 text-white text-capitalize">under $100.00</h2>
                                <a href="#" class="btn btn-solid btn-sm">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ratio3_2 h-auto">
                    <div class="collection-banner p-center text-center h-100 overlay-banner">
                        <div class="img-part h-100">
                            <img src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/banner/50.jpg"
                                class="img-fluid blur-up lazyload bg-img" alt="">
                        </div>
                        <div class="contain-banner banner-3">
                            <div>
                                <h2 class="mb-2 text-white text-capitalize ">best offers</h2>
                                <a href="#" class="btn btn-solid btn-sm">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ratio3_2 h-auto">
                    <div class="collection-banner p-center text-center h-100 overlay-banner">
                        <div class="img-part h-100">
                            <img src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/banner/51.jpg"
                                class="img-fluid blur-up lazyload bg-img" alt="">
                        </div>
                        <div class="contain-banner banner-3">
                            <div>
                                <h2 class="mb-2 text-white text-capitalize">life style</h2>
                                <a href="#" class="btn btn-solid btn-sm">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banne section end -->


    <!-- Product section start -->
    <section class="section-b-space pt-0 ratio_asos bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title1 section-t-space">
                        <h4>special offer</h4>
                        <h2 class="title-inner1">top collection</h2>
                    </div>
                    <div class="col-lg-6 offset-lg-3">
                        <div class="product-para">
                            <p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="no-slider row m-product infinite-product">
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="timer product-box-timer d-none d-sm-flex" id="demo"></div>
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/34.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Red Jacket</h6>
                                    </a>
                                    <h4>$16.00</h4>
                                </div>
                                <ul class="color-variant pt-0">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <ul class="color-variant quantity-variant box-l">
                                    <li class="bg-light">S</li>
                                    <li class="bg-light">M</li>
                                    <li class="bg-light">L</li>
                                    <li class="bg-light">Xl</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/35.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Green Jacket</h6>
                                    </a>
                                    <h4>$25.00</h4>
                                </div>
                                <ul class="color-variant pt-0">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <ul class="color-variant quantity-variant box-l">
                                    <li class="bg-light">32</li>
                                    <li class="bg-light">34</li>
                                    <li class="bg-light">36</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/36.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Black Poly Crepe Dress</h6>
                                    </a>
                                    <h4>$22.00</h4>
                                </div>
                                <ul class="color-variant image-swatch-demo pt-0">
                                    <li>
                                        <div><img src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/m-001.jpg" alt=""
                                                class="img-fluid blur-up lazyload bg-img"></div>
                                    </li>
                                    <li>
                                        <div><img src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/m-002.jpg" alt=""
                                                class="img-fluid blur-up lazyload bg-img"></div>
                                    </li>
                                    <li>
                                        <div><img src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/m-003.jpg" alt=""
                                                class="img-fluid blur-up lazyload bg-img"></div>
                                    </li>
                                </ul>
                                <ul class="color-variant quantity-variant box-l">
                                    <li class="bg-light">32</li>
                                    <li class="bg-light">34</li>
                                    <li class="bg-light">36</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/37.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Casual Winter Jacket</h6>
                                    </a>
                                    <h4>$500.00</h4>
                                </div>
                                <ul class="color-variant pt-0">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/38.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Rounded white T-shirt</h6>
                                    </a>
                                    <h4>$15.00</h4>
                                </div>
                                <ul class="color-variant pt-0">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/39.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Rounded white T-shirt</h6>
                                    </a>
                                    <h4>$15.00</h4>
                                </div>
                                <ul class="color-variant pt-0">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <ul class="color-variant quantity-variant box-l">
                                    <li class="bg-light">32</li>
                                    <li class="bg-light">34</li>
                                    <li class="bg-light">36</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/40.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Black Yellow Jacket</h6>
                                    </a>
                                    <h4>$20.00</h4>
                                </div>
                                <ul class="color-variant pt-0">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <ul class="color-variant quantity-variant box-l">
                                    <li class="bg-light">XS</li>
                                    <li class="bg-light">L</li>
                                    <li class="bg-light">XXL</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/41.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Red Blue Cotton Shirt</h6>
                                    </a>
                                    <h4>$500.00</h4>
                                </div>
                                <ul class="color-variant pt-0">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <ul class="color-variant quantity-variant box-l">
                                    <li class="bg-light">30</li>
                                    <li class="bg-light">32</li>
                                    <li class="bg-light">34</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/42.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Blue Denim Shirt</h6>
                                    </a>
                                    <h4>$28.00</h4>
                                </div>
                                <ul class="color-variant pt-0">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <ul class="color-variant quantity-variant box-l">
                                    <li class="bg-light">32</li>
                                    <li class="bg-light">34</li>
                                    <li class="bg-light">36</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/43.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Blue Denim Shirt</h6>
                                    </a>
                                    <h4>$30.00</h4>
                                </div>
                                <ul class="color-variant pt-0">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/44.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Full Slavees T-Shirt</h6>
                                    </a>
                                    <h4>$16.00</h4>
                                </div>
                                <ul class="color-variant pt-0">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/45.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Pink Dress</h6>
                                    </a>
                                    <h4>$30.00</h4>
                                </div>
                                <ul class="color-variant pt-0">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="load-more-button text-center"><a href="javascript:void(0)"
                            class="load-product btn btn-outline">load
                            more</a></div>
                </div>
            </div>
    </section>
    <!-- Product section end -->


    <!-- Parallax banner -->
    <section class="p-0 product-parallax">
        <div class="full-banner custom-space">
            <img src="{{ asset('multikart_all_in_one/') }}/assets/images/parallax/30.jpg" alt="" class="bg-img blur-up lazyload">
            <div class="ratio_square">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 ms-auto">
                            <div class="theme-card card-border">
                                <div class="offer-slider">
                                    <div>
                                        <div class="media">
                                            <a href="product-page(no-sidebar).html"><img alt=""
                                                    class="img-fluid blur-up lazyload"
                                                    src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/46.jpg"></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating"><i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>Black T-Shirt</h6>
                                                </a>
                                                <h4>$18.00</h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a href="product-page(no-sidebar).html"><img alt=""
                                                    class="img-fluid blur-up lazyload"
                                                    src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/47.jpg"></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating"><i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>Orange Jacket</h6>
                                                </a>
                                                <h4>$35.00</h4>
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
    </section>
    <!-- Parallax banner end -->


    <!-- product section start -->
    <section class="ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="product-left-title">
                        <div>
                            <h3>Biggest offer of the sale</h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo totam officiis nisi
                                neque non ex, odio atque digniss ab suscipit? Iste </p>
                            <a href="#" class="btn btn-outline btn-sm">view all product</a>
                            <ul class="slick-custom-arrow">
                                <li class="left-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></li>
                                <li class="right-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <!-- Product slider -->
                    <div class="custom-arrow-3 product-m no-arrow">
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/48.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                            class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                        title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a
                                        href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a
                                        href="compare.html" title="Compare"><i class="ti-reload"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Gray T-Shirt</h6>
                                    </a>
                                    <h4>$18.00</h4>
                                </div>
                                <ul class="color-variant pt-0">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/49.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                        title="Add to cart"><i class="ti-shopping-cart"></i></button> <a
                                        href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                            aria-hidden="true"></i></a> <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                            aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i
                                            class="ti-reload" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Solid white T-Shirt</h6>
                                    </a>
                                    <h4>$500.00</h4>
                                </div>
                                <ul class="color-variant pt-0">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/50.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                        title="Add to cart"><i class="ti-shopping-cart"></i></button> <a
                                        href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                            aria-hidden="true"></i></a> <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                            aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i
                                            class="ti-reload" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Women Black Lace Top</h6>
                                    </a>
                                    <h4>$14.00</h4>
                                </div>
                                <ul class="color-variant pt-0">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img
                                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/pro/51.jpg"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-box cart-box-bottom">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                        title="Add to cart"><i class="ti-shopping-cart"></i></button> <a
                                        href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                            aria-hidden="true"></i></a> <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                            aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i
                                            class="ti-reload" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="detail-inline">
                                    <a href="product-page(no-sidebar).html">
                                        <h6>Slim Fit Cotton Shirt</h6>
                                    </a>
                                    <h4>$500.00</h4>
                                </div>
                                <ul class="color-variant pt-0">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Product slider end -->
                </div>
            </div>
        </div>
    </section>
    <!-- product section end -->


    <!-- collection banner -->
    <section class="pb-0 ratio2_1">
        <div class="container">
            <div class="row partition2">
                <div class="col-md-6">
                    <a href="#">
                        <div class="collection-banner p-right text-center">
                            <div class="img-part">
                                <img src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/5.jpg" class="img-fluid blur-up lazyload bg-img"
                                    alt="">
                            </div>
                            <div class="contain-banner">
                                <div>
                                    <h4 class="text-white">save 30%</h4>
                                    <h2>new</h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#">
                        <div class="collection-banner p-right text-center">
                            <div class="img-part">
                                <img src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/6.jpg" class="img-fluid blur-up lazyload bg-img"
                                    alt="">
                            </div>
                            <div class="contain-banner">
                                <div>
                                    <h4>save 60%</h4>
                                    <h2 class="text-white">men</h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- collection banner end -->


    <!--  logo section -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="slide-6 no-arrow">
                        <div>
                            <div class="logo-block">
                                <a href="#"><img src="{{ asset('multikart_all_in_one/') }}/assets/images/logos/1.png" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <div class="logo-block">
                                <a href="#"><img src="{{ asset('multikart_all_in_one/') }}/assets/images/logos/2.png" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <div class="logo-block">
                                <a href="#"><img src="{{ asset('multikart_all_in_one/') }}/assets/images/logos/3.png" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <div class="logo-block">
                                <a href="#"><img src="{{ asset('multikart_all_in_one/') }}/assets/images/logos/4.png" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <div class="logo-block">
                                <a href="#"><img src="{{ asset('multikart_all_in_one/') }}/assets/images/logos/5.png" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <div class="logo-block">
                                <a href="#"><img src="{{ asset('multikart_all_in_one/') }}/assets/images/logos/6.png" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <div class="logo-block">
                                <a href="#"><img src="{{ asset('multikart_all_in_one/') }}/assets/images/logos/7.png" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <div class="logo-block">
                                <a href="#"><img src="{{ asset('multikart_all_in_one/') }}/assets/images/logos/8.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  logo section end-->


    <!-- newsletter section start -->
    <div class="">
        <div class="container border-section border-bottom-0">
            <section class="">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="subscribe">
                            <div>
                                <h4>KNOW IT ALL FIRST!</h4>
                                <p>Never Miss Anything From Multikart By Signing Up To Our Newsletter. </p>
                            </div>
                        </div>
                        <form class="form-inline subscribe-form">
                            <div class="form-group mx-sm-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Enter your email">
                            </div>
                            <button type="submit" class="btn btn-solid">subscribe</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- newsletter section end -->


    <!-- footer section start -->
    <footer class="footer-light section-t-space">
        <section class="section-b-space light-layout">
            <div class="container">
                <div class="row footer-theme partition-f">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-title footer-mobile-title">
                            <h4>about</h4>
                        </div>
                        <div class="footer-contant">
                            <div class="footer-logo">
                                <img src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/logo/33.png" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
                            <div class="footer-social">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col offset-xl-1">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>my account</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="#">mens</a></li>
                                    <li><a href="#">womens</a></li>
                                    <li><a href="#">clothing</a></li>
                                    <li><a href="#">accessories</a></li>
                                    <li><a href="#">featured</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>why we choose</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="#">shipping & return</a></li>
                                    <li><a href="#">secure shopping</a></li>
                                    <li><a href="#">gallary</a></li>
                                    <li><a href="#">affiliates</a></li>
                                    <li><a href="#">contacts</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>store information</h4>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    <li><i class="fa fa-map-marker"></i>Multikart Demo Store, Demo store India
                                        345-659</li>
                                    <li><i class="fa fa-phone"></i>Call Us: 123-456-7898</li>
                                    <li><i class="fa fa-envelope"></i>Email Us: <a
                                            href="#">Support@Multikart.com</a>
                                    </li>
                                    <li><i class="fa fa-fax"></i>Fax: 123456</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="sub-footer ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="footer-end">
                            <p><i class="fa fa-copyright" aria-hidden="true"></i> 2023-24 themeforest powered by
                                pixelstrap</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="payment-card-bottom">
                            <ul>
                                <li>
                                    <a href="#"><img src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/visa.png"
                                            alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/mastercard.png"
                                            alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/paypal.png"
                                            alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/american-express.png"
                                            alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/discover.png"
                                            alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer section end -->


    <!--modal popup start-->
    {{-- <div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal2">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="modal-bg">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div class="offer-content"><img src="{{ asset('multikart_all_in_one/') }}/assets/images/Offer-banner.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                        <h2>newsletter</h2>
                                        <form
                                            action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda"
                                            class="auth-form needs-validation" method="post"
                                            id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                            target="_blank">
                                            <div class="form-group mx-sm-3">
                                                <input type="text" class="form-control" name="EMAIL"
                                                    id="mce-EMAIL" placeholder="Enter your email"
                                                    required="required">
                                                <button type="submit" class="btn btn-solid"
                                                    id="mc-submit">subscribe</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--modal popup end-->


    <!-- Quick-view modal popup start-->
    <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content quick-view-modal">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="quick-view-img"><img src="{{ asset('multikart_all_in_one/') }}/assets/images/pro3/1.jpg" alt=""
                                    class="img-fluid blur-up lazyload"></div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">
                                <h2>Women Pink Shirt</h2>
                                <h3>$32.96</h3>
                                <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <div class="border-product">
                                    <h6 class="product-title">product details</h6>
                                    <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium</p>
                                </div>
                                <div class="product-description border-product">
                                    <div class="size-box">
                                        <ul>
                                            <li class="active"><a href="javascript:void(0)">s</a></li>
                                            <li><a href="javascript:void(0)">m</a></li>
                                            <li><a href="javascript:void(0)">l</a></li>
                                            <li><a href="javascript:void(0)">xl</a></li>
                                        </ul>
                                    </div>
                                    <h6 class="product-title">quantity</h6>
                                    <div class="qty-box">
                                        <div class="input-group"><span class="input-group-prepend"><button
                                                    type="button" class="btn quantity-left-minus"
                                                    data-type="minus" data-field=""><i
                                                        class="ti-angle-left"></i></button> </span>
                                            <input type="text" name="quantity"
                                                class="form-control input-number" value="1"> <span
                                                class="input-group-prepend"><button type="button"
                                                    class="btn quantity-right-plus" data-type="plus"
                                                    data-field=""><i class="ti-angle-right"></i></button></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-buttons"><a href="#" class="btn btn-solid">add to
                                        cart</a> <a href="#" class="btn btn-solid">view detail</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick-view modal popup end-->



    <!-- tap to top start -->
    <div class="tap-top">
        <div><i class="fa fa-angle-double-up"></i></div>
    </div>
    <!-- tap to top end -->


    <!-- latest jquery-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/jquery-3.3.1.min.js"></script>

    <!-- slick js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/slick.js"></script>

    <!-- wow js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/wow.min.js"></script>

    <!-- menu js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/menu.js"></script>

    <!-- Timer js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/timer.js"></script>

    <!-- slick js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/slick.js"></script>

    <!-- lazyload js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/lazysizes.min.js"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Notification js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/bootstrap-notify.min.js"></script>

    <!-- Theme js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/theme-setting.js"></script>
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/script.js"></script>

    <script>
        $(window).on('load', function() {
            setTimeout(function() {
                $('#exampleModal').modal('show');
            }, 2500);
        });

        new WOW().init();

        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>
</body>

</html>
