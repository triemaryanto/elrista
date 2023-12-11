<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Stock" subjudul="List Stock In" :breadcrumb="['Stock In']" />
    </x-slot>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Product</h5>
        </div>
        <div class="card-body">
            @if (!$isAdd)
                <button type="button" class="btn btn-primary" wire:click='AddStock'>Tambah Stock <i
                        class="icon-plus-circle2 ml-2"></i></button>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-styled-left alert-dismissible>
                        <button type="button"
                        class="close" data-dismiss="alert"><span>×</span></button>
                        {{ session('success') }}
                    </div>
                @endif
                <hr>
                <livewire:admin.table.stock-in />
            @else
                <form action="#" wire:submit.prevent="save">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Product:</label>
                                <div class="col-lg-10">
                                    @if ($product_id)
                                        {{ $data_p->name }}
                                        <button type="button" class="btn btn-info" wire:click="AddProduct_link">Get
                                            Product
                                            <i class="icon-plus-circle2 ml-2"></i></button>
                                    @else
                                        <button type="button" class="btn btn-info" wire:click="AddProduct_link">Get
                                            Product
                                            <i class="icon-plus-circle2 ml-2"></i></button>
                                    @endif
                                    @error('product_id')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                @if ($isEdit)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-danger" wire:click="clear">Cancel
                                                <i class="icon-cancel-square ml-2"></i></button>
                                        </div>
                                        <div class="col-md-6">

                                            <button type="submit" class="btn btn-primary">Update <i
                                                    class="icon-paperplane ml-2"></i></button>
                                        </div>
                                    </div>
                                @else
                                    <button type="submit" class="btn btn-primary">Save <i
                                            class="icon-paperplane ml-2"></i></button>
                                    <button type="button" class="btn btn-danger" wire:click="clear">Cancel
                                        <i class="icon-paperplane ml-2"></i></button>
                                @endif
                            </div>
                        </div>

                    </div>
                </form>
        </div>
        @endif
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
