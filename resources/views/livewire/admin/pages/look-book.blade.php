@push('css')
    <link href="{{ asset('costum/') }}/lookbook.css" rel="stylesheet" type="text/css">
@endpush
<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Look Book" subjudul="" :breadcrumb="['List Look Book', '(Tahap Pengembangan Developer)']" />
    </x-slot>

    <div class="card">
        <div class="card-header">
            @if ($isEdit)
                <a href="#" wire:click='cancel' class="btn btn-warning mt-md-0 mt-2 ml-md-8">Cancel</a>
            @else
                <a href="#" wire:click='add' class="btn btn-primary mt-md-0 mt-2">Create LookBook</a>
            @endif

        </div>

        <div class="card-body">
            @if ($isEdit)
                <form action="#" wire:submit.prevent="save">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="lookbook form-group text-center">
                                <label class="font-weight-semibold">Image:</label>
                                <div class="form_group lookbook-block">
                                    @if ($image)
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" class="img-fluid" id="mug"
                                                alt="" width="50%">
                                        @elseif($edit_image)
                                            <img src="{{ route('helper.show-picture', ['path' => $edit_image]) }}"
                                                alt="" class="img-fluid" width="50%">
                                        @endif
                                        @foreach (range(2, 19) as $number)
                                            <div class="lookbook-dot dot{{ $number }}">
                                                <i class="icon-plus-circle2 ml-2" wire:click="AddProduct_link"></i>
                                                <span> dot{{ $number }}</span>
                                                <a href="#">
                                                    <div class="dot-showbox">
                                                        @if ($product_id)
                                                            <img src="{{ route('helper.show-picture', ['path' => $data_p->gambar_satu->img1]) }}"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                            <div class="dot-info">
                                                                <h5 class="title">{{ $data_p->name }}</h5>
                                                                <h5>Rp. {{ number_format($data_p->price, 0, ',', '.') }}
                                                                </h5>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @else
                                        <img src="{{ asset('images/') }}/188CA378-B204-453E-8F9C-88A5C37A208C.PNG"
                                            class="img-fluid" alt="">
                                        @foreach (range(2, 19) as $number)
                                            <div class="lookbook-dot dot{{ $number }}">
                                                <i class="icon-plus-circle2 ml-2" wire:click="AddProduct_link"></i>
                                                <span> dot{{ $number }}</span>
                                                <a href="#">
                                                    <div class="dot-showbox">
                                                        @if ($product_id)
                                                            <img src="{{ route('helper.show-picture', ['path' => $data_p->gambar_satu->img1]) }}"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                            <div class="dot-info">
                                                                <h5 class="title">{{ $data_p->name }}</h5>
                                                                <h5>Rp.
                                                                    {{ number_format($data_p->price, 0, ',', '.') }}
                                                                </h5>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Image</label>
                                <div class="col-lg-10">
                                    <input wire:model="image" class="form-control" type="file"
                                        accept="image/png, image/jpeg">
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Save LookBook</button>
                            </div>
                        </div>

                    </div>
                </form>
            @else
                <livewire:admin.table.look-book-list>
            @endif

        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="Modalproduct" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="closeModalProduct">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <livewire:admin.pages.setting.banner.product-add-table />
                </div>
            </div>
        </div>
    </div>
    <livewire:admin.global.konfirmasi-hapus />
</div>

@push('js')
    <script>
        $(document).ready(function() {
            window.addEventListener('show-product-modal', event => {
                $('#Modalproduct').modal('show');
            });

            window.addEventListener('close-product-modal', event => {
                $('#Modalproduct').modal('hide');
            });
        });
    </script>
@endpush
