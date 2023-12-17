<section class="pt-0">
    <div class="slider-animate home-slider">
        <div>
            <div class="home">
                <img src="{{ $data ? route('helper.show-picture', ['path' => $data->image]) : asset('images/main-banner.jpg') }}" alt=""
                    class="bg-img blur-up lazyload">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="slider-contain px-padding">
                                <div>
                                    <h4 class="animated" data-animation-in="fadeInUp">
                                        {{ $data ? $data->promo : 'save 30%' }}</h4>
                                    <h1 class="animated" data-animation-in="fadeInUp" data-delay-in="0.3">
                                        {{ $data ? $data->name : 'special price' }}</h1><a
                                        href="{{ $data ? route('detail', ['slug' => $data->product->slug]) : url('') }}"
                                        class="btn btn-solid animated" data-animation-in="fadeInUp"
                                        data-delay-in="0.5">shop
                                        now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
