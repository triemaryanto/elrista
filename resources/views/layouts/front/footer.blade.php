<footer class="sticky-footer darken-background">
    <section class="section-b-space darken-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4>about</h4>
                    </div>
                    <div class="footer-contant">
                        <div class="footer-logo">
                            <img src="{{ get_setting()->logo ? route('helper.show-picture', ['path' => get_setting()->logo]) : asset('multikart_all_in_one/assets/images/icon/logo/f5.png') }}"
                                alt="" width="80%">
                        </div>
                        <p>{{ get_setting()->description ??
                            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                                                                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam.' }}
                        </p>
                        <div class="footer-social">
                            <ul>
                                <li>
                                    <a href="{{ get_setting()->link_fb ?? ''}}"><i class="fa fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="{{ get_setting()->link_x ?? ''}}"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="{{ get_setting()->link_ig ?? ''}}"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col offset-xl-1 ">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Category</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                @foreach (get_category() as $key => $value)
                                    <li><a
                                            href="{{ route('shop') . '?category=' . $value->slug }}">{{ $value->name }}</a>
                                    </li>
                                @endforeach
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
                                <li><a href="{{ route('pages', ['slug' => 'secure-shopping']) }}">secure shopping</a>
                                </li>
                                <li><a href="{{ route('pages', ['slug' => 'contacts']) }}">contacts</a></li>
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
                                <li><i
                                        class="fa fa-map-marker"></i>{{ get_setting()->address ?? 'Alamate Belum di Setting' }}
                                </li>
                                <li><i class="fa fa-phone"></i>Call Us: {{ get_setting()->phone ?? '123-456-7898' }}
                                </li>
                                <li><i class="fa fa-envelope"></i>Email Us: <a
                                        href="#">{{ get_setting()->email ?? 'Support@admin.com' }}</a>
                                </li>
                                <li><i class="fa fa-fax"></i>Fax: {{ get_setting()->fax ?? '123456' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="sub-footer darker-subfooter">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="footer-end">
                        <p><i class="fa fa-copyright" aria-hidden="true"></i> 2023-24 t hemeforest powered by
                            pixelstrap</p>
                    </div>
                </div>
                {{-- <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="payment-card-bottom">
                        <ul>
                            <li>
                                <a href="#"><img
                                        src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/visa.png"
                                        alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img
                                        src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/mastercard.png"
                                        alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img
                                        src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/paypal.png"
                                        alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img
                                        src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/american-express.png"
                                        alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img
                                        src="{{ asset('multikart_all_in_one/') }}/assets/images/icon/discover.png"
                                        alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</footer>
