<div>
    <div><img src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/cart.png" class="img-fluid blur-up lazyload"
            alt=""> <i class="ti-shopping-cart"></i></div>
    <span class="cart_qty_cls">{{ $data->count() }}</span>
    <ul class="show-div shopping-cart">
        @foreach ($data as $item)
            <li>
                <div class="media">
                    <a href="#">
                        <img alt="" class="me-3"
                            src="{{ asset('multikart_all_in_one/') }}/assets/images/fashion/product/1.jpg">
                    </a>
                    <div class="media-body">
                        <a href="#">
                            <h4>{{ $item->product->name }}</h4>
                        </a>
                        <h4><span>{{ $item->qty }} x {{ number_format($item->product->price, 0, ',', '.') }}</span>
                        </h4>
                    </div>
                </div>
                <div class="close-circle"><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></div>
            </li>
        @endforeach
        <li>
            <div class="total">
                <h5>subtotal : <span>$299.00</span></h5>
            </div>
        </li>
        <li>
            <div class="buttons">
                <a href="{{ route('cart') }}" class="view-cart">view cart</a>
                <a href="#" class="checkout">checkout</a>
            </div>
        </li>
    </ul>
</div>