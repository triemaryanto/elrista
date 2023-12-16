<div>
    @if (isset($lookbook))
        <section class="lookbook ratio_square lookbook-layout bg-light section-b-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title3">
                            <h4>exclusive products</h4>
                            <h2 class="title-inner3">shop from lookbook</h2>
                            <div class="line"></div>
                        </div>
                    </div>
                    @foreach ($lookbook as $value)
                        <div class="col-md-6">
                            <div class="lookbook-block">
                                <div>
                                    <img src="{{ route('helper.show-picture', ['path' => $value->image]) }}"
                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                </div>
                                @foreach ($value->dots as $item)
                                    <div class="lookbook-dot dot{{ $item->dots }}"><span><i class="fa fa-plus"
                                                aria-hidden="true"></i></span>
                                        <a href="#">
                                            <div class="dot-showbox"><img
                                                    src="{{ route('helper.show-picture', ['path' => $item->product->gambar_satu->img1]) }}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <div class="dot-info">
                                                    <h5 class="title">{{ $item->product->name }}</h5>
                                                    <h5>Rp,
                                                        {{ number_format($item->product->price, 0, ',', '.') }}</h5>
                                                    <h6><a
                                                            href="{{ route('detail', $item->product->slug) }}">details</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>
