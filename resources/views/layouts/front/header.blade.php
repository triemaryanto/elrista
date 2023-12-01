   <!-- loader start -->
   <div class="loader_skeleton">
       <header class="header-5 overlay-style">
           <div class="container">
               <div class="row">
                   <div class="col-sm-12">
                       <div class="main-menu">
                           <div class="menu-left">
                               <div class="brand-logo">
                                   <a href="index.html"> <img
                                           src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/logo/f12.png"
                                           class="img-fluid blur-up lazyload" alt=""></a>
                               </div>
                           </div>
                           <div class="menu-right pull-right">
                               <div>
                                   <nav>
                                       <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                       <ul class="sm pixelstrap sm-horizontal">
                                           <li>
                                               <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                                       aria-hidden="true"></i></div>
                                           </li>
                                           <!-- Main menu -->
                                           @include('layouts.front.menu')
                                           <!-- /main menu -->
                                       </ul>
                                   </nav>
                               </div>
                               <div class="top-header">
                                   <ul class="header-dropdown">
                                       <li class="mobile-wishlist"><a href="#"><img
                                                   src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/white-icon/heart.png"
                                                   alt="">
                                           </a></li>
                                       <li class="onhover-dropdown mobile-account"><img
                                               src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/white-icon/user.png"
                                               alt=""></li>
                                   </ul>
                               </div>
                               <div>
                                   <div class="icon-nav d-none d-sm-block">
                                       <ul>
                                           <li class="onhover-div mobile-search">
                                               <div><img
                                                       src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/white-icon/loupe.png"
                                                       onclick="openSearch()" class="img-fluid blur-up lazyload"
                                                       alt="">
                                                   <i class="ti-search" onclick="openSearch()"></i>
                                               </div>
                                           </li>
                                           <li class="onhover-div mobile-setting">
                                               <div><img
                                                       src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/white-icon/settings.png"
                                                       class="img-fluid blur-up lazyload" alt="">
                                                   <i class="ti-settings"></i>
                                               </div>
                                           </li>
                                           <li class="onhover-div mobile-cart">
                                               <div><img
                                                       src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/white-icon/cart.png"
                                                       class="img-fluid blur-up lazyload" alt="">
                                                   <i class="ti-shopping-cart"></i>
                                               </div>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </header>
       <section class="p-0 height-100 xs-responsive bg-white">
           <div class="home-slider">
               <div class="home"></div>
           </div>
       </section>
       <section class="banner-goggles banner-padding bg-white">
           <div class="container-fluid">
               <div class="row partition3">
                   <div class="col-md-6 ratio_40">
                       <div class="collection-banner p-right text-center">
                           <div class="ldr-bg">
                               <div class="contain-banner">
                                   <div>
                                       <h4></h4>
                                       <h2></h2>
                                       <h6></h6>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-3 ratio3_2 h-auto">
                       <div class="collection-banner p-center text-center h-100">
                           <div class="ldr-bg">
                               <div class="contain-banner">
                                   <div>
                                       <h4></h4>
                                       <h2></h2>
                                       <h6></h6>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-3 ratio3_2 h-auto">
                       <div class="collection-banner p-center text-center h-100">
                           <div class="ldr-bg">
                               <div class="contain-banner">
                                   <div>
                                       <h4></h4>
                                       <h2></h2>
                                       <h6></h6>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
   </div>
   <!-- loader end -->


   <!-- header start -->
   <header class="header-5 overlay-style">
       <div class="mobile-fix-option"></div>
       <div class="container">
           <div class="row">
               <div class="col-sm-12">
                   <div class="main-menu">
                       <div class="menu-left">
                           <div class="brand-logo">
                               <a href="index.html"> <img
                                       src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/logo/f12.png"
                                       class="img-fluid blur-up lazyload" alt=""></a>
                           </div>
                       </div>
                       <div class="menu-right pull-right">
                           <div>
                               <nav id="main-nav">
                                   <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                   <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                       <li>
                                           <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                                   aria-hidden="true"></i></div>
                                       </li>
                                       <!-- Main menu -->
                                       @include('layouts.front.menu')
                                       <!-- /main menu -->
                                   </ul>
                               </nav>
                           </div>
                           <div class="top-header">
                               <ul class="header-dropdown">
                                   <li class="mobile-wishlist"><a href="#"><img
                                               src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/white-icon/heart.png"
                                               alt=""> </a>
                                   </li>
                                   <li class="onhover-dropdown mobile-account">
                                       <img src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/white-icon/user.png"
                                           alt="">
                                       <ul class="onhover-show-div">
                                           <li>
                                               <a href="#" data-lng="en">
                                                   Login
                                               </a>
                                           </li>
                                           <li>
                                               <a href="#" data-lng="es">
                                                   Logout
                                               </a>
                                           </li>
                                       </ul>
                                   </li>
                               </ul>
                           </div>
                           <div>
                               <div class="icon-nav">
                                   <ul>
                                       <li class="onhover-div mobile-search">
                                           <div><img
                                                   src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/white-icon/loupe.png"
                                                   onclick="openSearch()" class="img-fluid blur-up lazyload"
                                                   alt="">
                                               <i class="ti-search" onclick="openSearch()"></i>
                                           </div>
                                           <div id="search-overlay" class="search-overlay">
                                               <div>
                                                   <span class="closebtn" onclick="closeSearch()"
                                                       title="Close Overlay">×</span>
                                                   <div class="overlay-content">
                                                       <div class="container">
                                                           <div class="row">
                                                               <div class="col-xl-12">
                                                                   <form>
                                                                       <div class="form-group">
                                                                           <input type="text" class="form-control"
                                                                               id="exampleInputPassword1"
                                                                               placeholder="Search a Product">
                                                                       </div>
                                                                       <button type="submit"
                                                                           class="btn btn-primary"><i
                                                                               class="fa fa-search"></i></button>
                                                                   </form>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </li>
                                       <li class="onhover-div mobile-setting">
                                           <div><img
                                                   src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/white-icon/settings.png"
                                                   class="img-fluid blur-up lazyload" alt="">
                                               <i class="ti-settings"></i>
                                           </div>
                                           <div class="show-div setting">
                                               <h6>language</h6>
                                               <ul>
                                                   <li><a href="#">english</a> </li>
                                                   <li><a href="#">french</a> </li>
                                               </ul>
                                               <h6>currency</h6>
                                               <ul class="list-inline">
                                                   <li><a href="#">euro</a> </li>
                                                   <li><a href="#">rupees</a> </li>
                                                   <li><a href="#">pound</a> </li>
                                                   <li><a href="#">doller</a> </li>
                                               </ul>
                                           </div>
                                       </li>
                                       <li class="onhover-div mobile-cart">
                                           <div><img
                                                   src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/white-icon/cart.png"
                                                   class="img-fluid blur-up lazyload" alt="">
                                               <i class="ti-shopping-cart"></i>
                                           </div>
                                           <ul class="show-div shopping-cart">
                                               <li>
                                                   <div class="media">
                                                       <a href="#"><img alt="" class="me-3"
                                                               src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/product/1.jpg"></a>
                                                       <div class="media-body">
                                                           <a href="#">
                                                               <h4>item name</h4>
                                                           </a>
                                                           <h4><span>1 x $ 299.00</span></h4>
                                                       </div>
                                                   </div>
                                                   <div class="close-circle">
                                                       <a href="#"><i class="fa fa-times"
                                                               aria-hidden="true"></i></a>
                                                   </div>
                                               </li>
                                               <li>
                                                   <div class="media">
                                                       <a href="#"><img alt="" class="me-3"
                                                               src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/product/2.jpg"></a>
                                                       <div class="media-body">
                                                           <a href="#">
                                                               <h4>item name</h4>
                                                           </a>
                                                           <h4><span>1 x $ 299.00</span></h4>
                                                       </div>
                                                   </div>
                                                   <div class="close-circle">
                                                       <a href="#"><i class="fa fa-times"
                                                               aria-hidden="true"></i></a>
                                                   </div>
                                               </li>
                                               <li>
                                                   <div class="total">
                                                       <h5>subtotal : <span>$299.00</span></h5>
                                                   </div>
                                               </li>
                                               <li>
                                                   <div class="buttons">
                                                       <a href="cart.html" class="view-cart">view cart</a>
                                                       <a href="#" class="checkout">checkout</a>
                                                   </div>
                                               </li>
                                           </ul>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </header>
   <!-- header end -->
