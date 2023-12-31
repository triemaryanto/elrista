<div>
    <x-slot:title>
        {{ $data->name }}&nbsp;-&nbsp;
    </x-slot>
    <x-slot:description>
        {{ $data->description }}
    </x-slot>
    <x-slot:keywords>
        {{ $data->description }}
    </x-slot>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>product</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6" wire:ignore>
                        @foreach ($data->listImage as $image)
                            <div>
                                <img src="{{ route('helper.show-picture', ['path' => $image->img1]) }}" alt=""
                                    class="img-1 img-fluid blur-up lazyload image_zoom_cls-0">
                            </div>
                            <div><img src="{{ route('helper.show-picture', ['path' => $image->img2]) }}" alt=""
                                    class="img-2 img-fluid blur-up lazyload image_zoom_cls-0"></div>
                            <div class="color"></div>
                        @endforeach

                    </div>

                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            {{-- <div class="product-count">
                                <ul>
                                    <li>
                                        <img src="{{ asset('multikart_all_in_one/') }}/assets/images/fire.gif"
                                            class="img-fluid" alt="image">
                                        <span class="p-counter">37</span>
                                        <span class="lang">orders in last 24 hours</span>
                                    </li>
                                    <li>
                                        <img src="{{ asset('multikart_all_in_one/') }}/assets/images/person.gif"
                                            class="img-fluid user_img" alt="image">
                                        <span class="p-counter">44</span>
                                        <span class="lang">active view this</span>
                                    </li>
                                </ul>
                            </div> --}}
                            <h2>{{ $data->name }}</h2>
                            {{-- <div class="rating-section">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <h6>120 ratings</h6>
                            </div> --}}
                            {{-- <div class="label-section">
                                <span class="badge badge-grey-color">#1 Best seller</span>
                                <span class="label-text">in fashion</span>
                            </div> --}}
                            <div class="label-section">
                                <span class="label-text">Harga :</span>
                            </div>
                            <h3 class="price-detail">Rp.
                                {{ number_format($data->price, 0, ',', '.') }}</h3>
                            <ul class="color-variant" wire:ignore>
                                @foreach ($this->image->listColor as $color)
                                    <li id="color-{{ $color->id }}" style="background-color: {{ $color->color }};"
                                        wire:click="addColor({{ $color->id }})">
                                    </li>
                                @endforeach

                            </ul>
                            <div id="selectSize" class="addeffect-section product-description border-product">
                                <h6 class="product-title size-text">select size <span><a href=""
                                            data-bs-toggle="modal" data-bs-target="#sizemodal">size
                                            chart</a></span></h6>
                                <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sheer
                                                    Straight Kurta</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body"><img
                                                    src="{{ asset('multikart_all_in_one/') }}/assets/images/size-chart.jpg"
                                                    alt="" class="img-fluid blur-up lazyload"></div>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="error-message">please select size</h6>
                                <div class="size-box" wire:ignore>
                                    <ul>
                                        @foreach ($data->listSize as $size)
                                            <li id="size-{{ $size->id }}">
                                                <a href="javascript:void(0)"
                                                    wire:click='addSize({{ $size->id }})'>{{ $size->size }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box" style="border-right-color: #ddc7c7">
                                    <div class="input-group">
                                        <input type="number" name="quantity" class="form-control" value="1"
                                            min="1" wire:model="qty">
                                    </div>
                                </div>
                            </div>
                            <div class="product-buttons">
                                <button type="button" wire:click="addCart"
                                    class="btn btn-solid hover-solid btn-animation"><i class="fa fa-shopping-cart me-1"
                                        aria-hidden="true"></i> add to cart</button>
                                <button type="button" class="btn btn-solid" wire:click='addwishlist'><i
                                        class="fa fa-bookmark fz-16 me-2" aria-hidden="true"
                                        wire:click="addwishlist"></i>wishlist</button>
                            </div>
                            {{-- <div class="product-count">
                                <ul>
                                    <li>
                                        <img src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/truck.png"
                                            class="img-fluid" alt="image">
                                        <span class="lang">Free shipping for orders above $500 USD</span>
                                    </li>
                                </ul>
                            </div> --}}
                            <div class="border-product">
                                <h6 class="product-title">shipping info</h6>
                                <ul class="shipping-info">
                                    <li>100% Original Products</li>
                                </ul>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">share it</h6>
                                <div class="product-icon">
                                    <ul class="product-social">
                                        <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="border-product">
                                <h class="product-title">100% secure payment</h 6>
                                <img src="{{ asset('multikart_all_in_one/') }}/assets/images/payment.png"
                                    class="img-fluid mt-1" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->


    <!-- product-tab starts -->
    <section class="tab-product m-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab"
                                href="#top-home" role="tab" aria-selected="true"><i
                                    class="icofont icofont-ui-home"></i>Details</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab"
                                href="#top-profile" role="tab" aria-selected="false"><i
                                    class="icofont icofont-man-in-glasses"></i>Specification</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab"
                                href="#top-contact" role="tab" aria-selected="false"><i
                                    class="icofont icofont-contacts"></i>Video</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="review-top-tab" data-bs-toggle="tab"
                                href="#top-review" role="tab" aria-selected="false"><i
                                    class="icofont icofont-contacts"></i>Write Review</a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                            aria-labelledby="top-home-tab">
                            <div class="product-tab-discription">
                                <div class="part">
                                    <p> {{ $data->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-profile" role="tabpanel"
                            aria-labelledby="profile-top-tab">
                            <p>{{ $data->specification }}</p>
                        </div>
                        <div class="tab-pane fade" id="top-contact" role="tabpanel"
                            aria-labelledby="contact-top-tab">
                            <div class="">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/BUWzX78Ye_8"
                                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                            <form class="theme-form">
                                <div class="form-row row">
                                    <div class="col-md-12">
                                        <div class="media">
                                            <label>Rating</label>
                                            <div class="media-body ms-3">
                                                <div class="rating three-star"><i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Enter Your name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email"
                                            placeholder="Email" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="review">Review Title</label>
                                        <input type="text" class="form-control" id="review"
                                            placeholder="Enter your Review Subjects" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="review">Review Title</label>
                                        <textarea class="form-control" placeholder="Wrire Your Testimonial Here" id="exampleFormControlTextarea1"
                                            rows="6"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-solid" type="submit">Submit YOur
                                            Review</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-tab ends -->


    <!-- product section start -->
    <section class="section-b-space ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col-12 product-related">
                    <h2>related products</h2>
                </div>
            </div>
            <div class="row search-product">
                @foreach ($retaled as $item)
                    <div class="col-xl-2 col-md-4 col-6">
                        <livewire:landing.component.product-list :productId="$item->id" :wire:key="'item'.$item->id">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- product section end -->z
</div>

@push('js')
    <script>
        window.addEventListener('add-color', event => {
            // console.log(event.detail.color);
            $(".color-variant li").removeClass("active");
            $("#" + event.detail.id).addClass("active");

            let color = document.querySelector(".color");
            color.style.backgroundColor = event.detail.color;

        });

        window.addEventListener('add-size', event => {
            // console.log(event.detail.size);

            $(".size-box ul li").removeClass("active");
            $('#selectSize').removeClass('cartMove');
            $("#" + event.detail.id).addClass("active");
            $("#" + event.detail.id).parent().addClass('selected');

        });
    </script>
@endpush
