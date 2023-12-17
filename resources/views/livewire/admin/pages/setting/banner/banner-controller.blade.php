<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Setting" subjudul="Banner" :breadcrumb="['Setting', 'Banner']" />
    </x-slot>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Banner</h5>
        </div>

        <div class="card-body">
            @if (!$isAdd)
                <button type="button" class="btn btn-primary" wire:click='AddBanner'>Add Banner <i
                        class="icon-plus-circle2 ml-2"></i></button>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-styled-left alert-dismissible>
                        <button type="button"
                        class="close" data-dismiss="alert"><span>×</span></button>
                        {{ session('success') }}
                    </div>
                @endif
                <hr>
                <livewire:admin.pages.setting.banner.banner-table />
            @else
                <form wire:submit.prevent="simpan" method="POST">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Name :</label>
                        <div class="col-md-8">
                            <select class="form-control" wire:model="category">
                                <option value="0">-- Pilih Kategori --</option>
                                @foreach ($kategori_banner as $a => $k)
                                    <option value="{{ $a }}">{{ $k[1] }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Image :</label>
                        <div class="col-md-6">
                            <label class="form-label" for="product_name">File Banners
                                @if ($category)
                                    {{ $kategori_banner[$category][2] }}
                                @endif
                            </label>
                            <div class="" style="max-width: 400px">
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" alt="" class="img-fluid">
                                @elseif($edit_image)
                                    <img src="{{ route('helper.show-picture', ['path' => $edit_image]) }}"
                                        alt="" class="img-fluid">
                                @else
                                    @if ($category)
                                        <img src="{{ $kategori_banner[$category][3] }}"
                                            alt="{{ $kategori_banner[$category][2] }}" class="img-fluid">
                                    @else
                                        <img src="{{ asset('ecom_backend/') }}/assets/imgs/theme/upload.svg"
                                            alt="" class="img-fluid">
                                    @endif
                                @endif
                                <input wire:model="image" class="form-control" type="file"
                                    accept="image/png, image/jpeg">
                            </div>
                            <span class="form-text text-primary">
                                @if ($category)
                                    {{ $kategori_banner[$category][2] }}
                                @endif
                            </span>
                            @error('image')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Name :</label>
                        <div class="col-md-8">
                            {{ Form::text(null, null, [
                                'class' => 'form-control' . ($errors->has('name') ? ' border-danger' : null),
                                'placeholder' => 'Name',
                                'wire:model.lazy' => 'name',
                            ]) }}
                            @error('name')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Promo :</label>
                        <div class="col-md-8">
                            {{ Form::text(null, null, [
                                'class' => 'form-control' . ($errors->has('promo') ? ' border-danger' : null),
                                'placeholder' => 'Promo',
                                'wire:model.lazy' => 'promo',
                            ]) }}
                            @error('promo')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Product:</label>
                        <div class="col-lg-10">
                            @if ($product_id)
                                {{ $data_p->name }}
                                <button type="button" class="btn btn-info ml-4" wire:click="AddProduct_link">Get Product <i
                                        class="icon-plus-circle2 ml-2"></i></button>
                            @else
                                <button type="button" class="btn btn-info" wire:click="AddProduct_link">Get Product <i
                                        class="icon-plus-circle2 ml-2"></i></button>
                            @endif
                            @error('product_id')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <button type="submit" class="btn btn-primary text-right">Save</button>
                            <button type="button" class="btn btn-primary text-right"
                                wire:click="CancelForm">Cancel</button>
                        </li>
                    </ul>
                </form>
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
