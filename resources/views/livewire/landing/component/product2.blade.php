<section class="bag-product ratio_square section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title3">
                    <h4>exclusive products</h4>
                    <h2 class="title-inner3">special products</h2>
                    <div class="line"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row no-slider margin-default five-product">
                    @foreach ($product2 as $listProduk2)
                        <div class="product-box product-wrap product-style-2">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="{{ route('detail', ['slug' => $listProduk2->slug]) }}">
                                        @foreach ($listProduk2->listImage as $gambar)
                                            <img src="{{ route('helper.show-picture', ['path' => $gambar->img1]) }}"
                                                class="img-fluid blur-up lazyload bg-img">
                                        @endforeach
                                    </a>
                                </div>
                                <div class="cart-detail">
                                    <a href="javascript:void(0)" title="Add to Wishlist">
                                        <i class="ti-heart" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                        title="Quick View">
                                        <i class="ti-search" aria-hidden="true"></i>
                                    </a>
                                    <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="product-page(no-sidebar).html">
                                    <h6>{{ $listProduk2->name }}</h6>
                                </a>
                                <h4>Rp. {{ number_format($listProduk2->price, 0, ',', '.') }}
                                </h4>
                                <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <div class="add-btn">
                                    <a href="javascript:void(0)" class="">
                                        <i class="ti-shopping-cart"></i> add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
