<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Product" subjudul="Category" :breadcrumb="['Product', 'Category']" />
    </x-slot>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Product</h5>
        </div>

        <div class="card-body">
            @if (!$isAdd)
                <button type="button" class="btn btn-primary" wire:click='AddProduct'>Add Product <i
                        class="icon-plus-circle2 ml-2"></i></button>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-styled-left alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                        Data saved successfully
                    </div>
                @endif
                <hr>
                <livewire:admin.pages.product.product-table />
            @else
                <form action="#" wire:submit.prevent="save">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Name:</label>
                                <div class="col-lg-10">
                                    {{ Form::text(null, null, [
                                        'class' => 'form-control' . ($errors->has('name') ? ' border-danger' : null),
                                        'placeholder' => 'Name Product',
                                        'wire:model.lazy' => 'name',
                                    ]) }}
                                    @error('name')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Description:</label>
                                <div class="col-lg-10">
                                    {{ Form::textarea(null, null, [
                                        'class' => 'form-control' . ($errors->has('description') ? ' border-danger' : null),
                                        'placeholder' => 'Description Product',
                                        'wire:model.lazy' => 'description',
                                    ]) }}
                                    @error('description')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Specification:</label>
                                <div class="col-lg-10">
                                    {{ Form::textarea(null, null, [
                                        'class' => 'form-control' . ($errors->has('specification') ? ' border-danger' : null),
                                        'placeholder' => 'Specification Product',
                                        'wire:model.lazy' => 'specification',
                                    ]) }}
                                    @error('specification')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Shop info:</label>
                                <div class="col-lg-10">
                                    {{ Form::textarea(null, null, [
                                        'class' => 'form-control' . ($errors->has('shop_info') ? ' border-danger' : null),
                                        'placeholder' => 'Shop Info Product',
                                        'wire:model.lazy' => 'shop_info',
                                    ]) }}
                                    @error('shop_info')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Image:</label>
                                <div class="col-lg-10">
                                    <button type="button" class="btn btn-info" wire:click="AddImageProduct">Add
                                        Image <i class="icon-plus-circle2 ml-2"></i></button>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-12">
                            <div class="text-right">
                                @if ($isEdit)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-danger"
                                                wire:click="CancelAddProduct">Cancel <i
                                                    class="icon-cancel-square ml-2"></i></button>
                                        </div>
                                        <div class="col-md-6">

                                            <button type="submit" class="btn btn-primary">Update <i
                                                    class="icon-paperplane ml-2"></i></button>
                                        </div>
                                    </div>
                                @else
                                    <button type="submit" class="btn btn-primary">Save <i
                                            class="icon-paperplane ml-2"></i></button>
                                    <button type="button" class="btn btn-danger" wire:click="CancelAddProduct">Cancel
                                        <i class="icon-paperplane ml-2"></i></button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
    <livewire:admin.global.konfirmasi-hapus />

    <div wire:ignore.self class="modal fade" id="viewModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
        role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="closeViewModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-semibold">Your avatar:</label>
                                    <div class="media mt-0">
                                        <div class="mr-3">
                                            @if ($img_path)
                                                <img src="{{ $img_path->temporaryUrl() }}" class="img-fluid"
                                                    id="mug" alt="">
                                            @else
                                                <img src="{{ asset('limitless/') }}/global_assets/images/placeholders/placeholder.jpg"
                                                    class="img-fluid" alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="media mt-0">
                                        <div class="media-body">
                                            <div class="uniform-uploader">
                                                <input type="file" class="form-input-styled" data-fouc=""
                                                    wire:model="img_path"><span class="filename"
                                                    style="user-select: none;">No file
                                                    selected</span><span class="action btn bg-pink-400"
                                                    style="user-select: none;">Choose
                                                    File</span>
                                            </div>
                                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max
                                                file size
                                                2Mb</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- @if ($img_path) --}}
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" wire:model="color" />
                                        <span class="input-group-append">
                                            <span class="input-group-text">
                                                <input type="color" value="#CCCCCC" title="Choose a color"
                                                    wire:model="color" placeholder="PILIH">
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary" wire:click="AddColor">Add
                                            Color <i class="icon-plus-circle2 ml-2"></i></button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <ul>
                                        @foreach ($listColor as $a => $b)
                                            <li><span class="badge"
                                                    style="background-color: {{ $a + 1 }};"></span>
                                                {{ $b }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                {{-- @endif --}}
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $(document).ready(function() {
            window.addEventListener('close-modal', event => {
                $('#viewModal').modal('hide');
            });

            window.addEventListener('show-view-modal', event => {
                $('#viewModal').modal('show');
            });
        });
    </script>
@endpush
