<div>
    @if (Route::has('login'))
        @auth
            <div><img src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/cart.png"
                    class="img-fluid blur-up lazyload" alt=""> <i class="ti-shopping-cart"></i></div>
            <span class="cart_qty_cls">{{ $data->count() }}</span>
            <ul class="show-div shopping-cart">
                @foreach ($data as $item)
                    <li>
                        <div class="media">
                            <a href="#">
                                <img alt="" class="me-3"
                                    src="{{ route('helper.show-picture', ['path' => $item->product->gambar_satu->img1]) }}">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    <h4>{{ $item->product->name }}</h4>
                                </a>
                                <h4><span>{{ $item->qty }} x
                                        {{ number_format($item->product->price, 0, ',', '.') }}</span>
                                </h4>
                            </div>
                        </div>
                        <div class="close-circle"><a href="#"><i class="fa fa-times" aria-hidden="true"
                                    wire:click="deleteCart({{ $item->id }})"></i></a></div>
                    </li>
                    @php
                        $sub_total = $sub_total + $item->product->price;
                    @endphp
                @endforeach
                <li>
                    <div class="total">
                        <h5>subtotal : <span>{{ number_format($sub_total, 0, ',', '.') }}</span></h5>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="{{ route('cart') }}" class="view-cart">view cart</a>
                        <a href="{{ route('checkout') }}" class="checkout">checkout</a>
                    </div>
                </li>
            </ul>
        @else
            <div><img src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/cart.png"
                    class="img-fluid blur-up lazyload" alt=""> <i class="ti-shopping-cart"></i></div>
            <span class="cart_qty_cls">{{ count($cart) }}</span>
            <ul class="show-div shopping-cart">
                @foreach ($daftar as $val => $item)
                    <li>
                        <div class="media">
                            <a href="#">
                                <img alt="" class="me-3"
                                    src="{{ route('helper.show-picture', ['path' => $item['img1']]) }}">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    <h4>{{ $item['name'] }}</h4>
                                </a>
                                <h4><span>{{ $item['qty'] }} x
                                        {{ number_format($item['price'], 0, ',', '.') }}</span>
                                </h4>
                            </div>
                        </div>
                        <div class="close-circle"><a href="#"><i class="fa fa-times" aria-hidden="true"
                                    wire:click="deleteCartsession({{ $val }})"></i></a></div>
                    </li>
                    @php
                        $sub_total = $sub_total + $item['price'];
                    @endphp
                @endforeach
                <li>
                    <div class="total">
                        <h5>subtotal : <span>{{ number_format($sub_total, 0, ',', '.') }}</span></h5>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="{{ route('cart') }}" class="view-cart">view cart</a>
                        <a href="{{ route('checkout') }}" class="checkout">checkout</a>
                    </div>
                </li>
            </ul>
        @endauth
    @endif
</div>
