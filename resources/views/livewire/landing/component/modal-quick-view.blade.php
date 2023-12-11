<div>
    <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content quick-view-modal">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="quick-view-img">
                                @foreach ($data->listImage ?? [] as $image)
                                    <div>
                                        <img src="{{ route('helper.show-picture', ['path' => $image->img1]) }}"
                                            alt="" class="img-1 img-fluid blur-up lazyload">
                                    </div>
                                    <div><img src="{{ route('helper.show-picture', ['path' => $image->img2]) }}"
                                            alt="" class="img-2 img-fluid blur-up lazyload">
                                    </div>
                                    <div class="color"></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">
                                <h2>{{ $data->name ?? '' }}</h2>
                                <h3>@currency($data->price ?? 0)</h3>
                                <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <div class="border-product">
                                    <h6 class="product-title">product details</h6>
                                    <p>{{ $data->description ?? '' }}</p>
                                </div>
                                <div class="product-description border-product">
                                    <div class="size-box">
                                        <ul>
                                            @foreach ($data->listSize ?? [] as $size)
                                                <li id="size-{{ $size->id }}">
                                                    <a href="javascript:void(0)"
                                                        wire:click='addSize({{ $size->id }})'>{{ $size->size }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <h6 class="product-title">quantity</h6>
                                    <div class="qty-box">
                                        <div class="input-group"><span class="input-group-prepend"><button
                                                    type="button" class="btn quantity-left-minus" data-type="minus"
                                                    data-field=""><i class="ti-angle-left"></i></button> </span>
                                            <input type="text" name="quantity" class="form-control input-number"
                                                value="1"> <span class="input-group-prepend"><button type="button"
                                                    class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                        class="ti-angle-right"></i></button></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-buttons">
                                    {{-- <a href="#" class="btn btn-solid">add to cart</a> --}}
                                    <a href="{{ route('detail', $data->slug ?? '') }}" class="btn btn-solid">view detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick-view modal popup end-->
</div>

@push('js')
    <script>
        window.addEventListener('close-modalquickview', event => {
            $('#quick-view').modal('hide');
        });

        window.addEventListener('modalquickview', event => {
            $('#quick-view').modal('show');
        });
    </script>
@endpush
