<div>
    <div class="product-box product-wrap product-style-2">
        <div class="img-wrapper">
            <div class="front">
                <a href="{{ route('detail', ['slug' => $data->slug]) }}">
                    @foreach ($data->listImage as $gambar)
                        <img src="{{ route('helper.show-picture', ['path' => $gambar->img1]) }}"
                            class="img-fluid blur-up lazyload bg-img">
                    @endforeach
                </a>
            </div>
            <div class="cart-detail">
                <a href="javascript:void(0)" title="Add to Wishlist">
                    <i class="ti-heart" aria-hidden="true"></i>
                </a>
                <button type="button" wire:click="$emit('showModal', {{ $data->id }})" title="Quick View">
                    <i class="ti-search" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <div class="product-info">
            <a href="product-page(no-sidebar).html">
                <h6>{{ $data->name }}</h6>
            </a>
            <h4>Rp. {{ number_format($data->price, 0, ',', '.') }}
            </h4>
            <ul class="color-variant">
                <li class="bg-light0"></li>
                <li class="bg-light1"></li>
                <li class="bg-light2"></li>
            </ul>
            <div class="add-btn">
                <a href="{{ route('detail' ,$data->slug) }}" class="">
                    <i class="ti-shopping-cart"></i> view details
                </a>
            </div>
        </div>
    </div>
