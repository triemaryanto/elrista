<section class="container-fluid banner-padding ratio_square">
    <div class="row">
        <div class="col-12">
            <div class="slide-3-center slick-default-margin no-arrow overflow-hidden">
                <div>
                    <div class="vertical-banner">
                        <div class="banner-effect">
                            <div>
                                <img src="{{ $a ? route('helper.show-picture', ['path' => $a->image]) : asset('images/DSC08127.JPEG') }}"
                                    class="img-fluid bg-img">
                            </div>
                        </div>
                        <div class="vertical-content">
                            <h2>{{ $a ? $a->name : 'move me yoga sports' }}</h2>
                            <a href="{{ $a ? route('detail', ['slug' => $a->product->slug]) : url('') }}">shop Now</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="vertical-banner">
                        <div class="banner-effect">
                            <div>
                                <img src="{{ $b ? route('helper.show-picture', ['path' => $b->image]) : asset('images/D8D14C6F-8AA7-4F13-9F48-FA0E0478C050.JPG') }}"
                                    class="img-fluid bg-img">
                            </div>
                        </div>
                        <div class="vertical-content">
                            <h2>{{ $b ? $b->name : 'move me yoga sports' }}</h2>
                            <a href="{{ $b ? route('detail', ['slug' => $b->product->slug]) : url('') }}">shop Now</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="vertical-banner">
                        <div class="banner-effect">
                            <div>
                                <img src="{{ $c ? route('helper.show-picture', ['path' => $c->image]) : asset('images/0DE1E112-49C3-4DA0-B12A-E9EF2DB38486.JPG') }}"
                                    class="img-fluid bg-img">
                            </div>
                        </div>
                        <div class="vertical-content">
                            <h2>{{ $c ? $c->name : 'move me yoga sports' }}</h2>
                            <a href="{{ $c ? route('detail', ['slug' => $c->product->slug]) : url('') }}">shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
