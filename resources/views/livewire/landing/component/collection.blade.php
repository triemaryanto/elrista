<section class="banner-goggles ratio2_1">
    <div class="container">
        <div class="row partition3">
            <div class="col-md-4">
                <a href="{{ $a ? route('detail', ['slug' => $a->product->slug]) : url('') }}">
                    <div class="collection-banner p-right text-end">
                        <div class="img-part">
                            <img src="{{ $a ? route('helper.show-picture', ['path' => $a->image]) : asset('multikart_all_in_one/assets/images/yoga/banner/9.jpg') }}"
                                class="img-fluid blur-up lazyload bg-img" alt="">
                        </div>
                        <div class="contain-banner banner-3">
                            <div>
                                <h4>{{ $a ? $a->promo : '10% off' }}</h4>
                                <h2>{{ $a ? $a->name : 'legins' }}</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ $b ? route('detail', ['slug' => $b->product->slug]) : url('') }}">
                    <div class="collection-banner">
                        <div class="img-part">
                            <img src="{{ $b ? route('helper.show-picture', ['path' => $b->image]) : asset('multikart_all_in_one/assets/images/yoga/banner/10.jpg') }}"
                                class="img-fluid blur-up lazyload bg-img" alt="">
                        </div>
                        <div class="contain-banner banner-3">
                            <div>
                                <h4>{{ $b ? $b->promo : '10% off' }}</h4>
                                <h2>{{ $b ? $b->name : 'inners' }}</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ $c ? route('detail', ['slug' => $c->product->slug]) : url('') }}">
                    <div class="collection-banner p-right text-end">
                        <div class="img-part">
                            <img src="{{ $c ? route('helper.show-picture', ['path' => $c->image]) : asset('multikart_all_in_one/assets/images/yoga/banner/11.jpg') }}"
                                class="img-fluid blur-up lazyload bg-img" alt="">
                        </div>
                        <div class="contain-banner banner-3">
                            <div>
                                <h4>{{ $c ? $c->promo : '50% off' }}</h4>
                                <h2>{{ $c ? $c->name : 'shorts' }}</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
