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
                    <div class="alert alert-success alert-styled-left alert-dismissible>
                        <button type="button"
                        class="close" data-dismiss="alert"><span>×</span></button>
                        {{ session('success') }}
                    </div>
                @endif
                <hr>
                <livewire:admin.pages.product.product-table />
            @else
                <form action="#" wire:submit.prevent="save">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Category</label>
                                <div class="col-lg-10">
                                    <select class="form-control" wire:model="category">
                                        <option> - Pilih Kategori -</option>
                                        @foreach ($listCategory as $val)
                                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Nama Product</label>
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
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Description</label>
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
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Specification</label>
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
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Shop info</label>
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
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Price</label>
                                <div class="col-lg-10">
                                    {{ Form::number(null, null, [
                                        'class' => 'form-control' . ($errors->has('price') ? ' border-danger' : null),
                                        'placeholder' => 'Price Product',
                                        'wire:model.lazy' => 'price',
                                    ]) }}
                                    @error('price')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Weight (*gram)</label>
                                <div class="col-lg-10">
                                    {{ Form::number(null, null, [
                                        'class' => 'form-control' . ($errors->has('weight') ? ' border-danger' : null),
                                        'placeholder' => 'Price Product',
                                        'wire:model.lazy' => 'weight',
                                    ]) }}
                                    @error('weight')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Publish</label>
                                <div class="col-lg-10">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" wire:model="status">
                                            @if ($status)
                                                Publish
                                            @else
                                                Not Publish
                                            @endif
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Image</label>
                                <div class="col-lg-10">
                                    <button type="button" class="btn btn-info" wire:click="AddImageProduct">Add
                                        Image <i class="icon-plus-circle2 ml-2"></i></button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Priview Image</label>
                                <div class="col-lg-10">
                                    <div class="row">
                                        @foreach ($editListImage as $item)
                                            <div class="col-lg-4">
                                                <img src="{{ route('helper.show-picture', ['path' => $item->img1]) }}"
                                                    class="img-fluid" alt="" width="50%">
                                                <button type="button" class="btn btn-link"
                                                    wire:click="confirmDelete({{ $item->id }},'image','edit')"><i
                                                        class="icon-trash
                                                        mr-2"></i></button>
                                            </div>
                                        @endforeach
                                        @foreach ($listImage as $item)
                                            <div class="col-lg-4">
                                                <img src="{{ $item['img1']->temporaryUrl() }}" class="img-fluid"
                                                    alt="" width="50%">
                                                <button type="button" class="btn btn-link"
                                                    wire:click="confirmDelete({{ $item['id'] }},'image','new')"><i
                                                        class="icon-trash
                                                        mr-2"></i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('listImage')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Size</label>
                                <div class="col-lg-10">
                                    <button type="button" class="btn btn-info" wire:click="AddSizeProduct">Add
                                        Size <i class="icon-plus-circle2 ml-2"></i></button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">List Size</label>
                                <div class="col-lg-10">
                                    <div class="row">
                                        @foreach ($editListSize as $item)
                                            <span
                                                class="badge badge-light badge-striped badge-striped-left border-left-grey mr-3">{{ $item->size }}
                                                <button type="button" class="btn btn-link btn-sm"
                                                    wire:click="confirmDelete('{{ $item->id }}','size','edit')"><i
                                                        class="icon-trash
                                                mr-2"></i></button>
                                            </span>
                                        @endforeach
                                        @foreach ($listSize as $item)
                                            <span
                                                class="badge badge-light badge-striped badge-striped-left border-left-grey mr-3">{{ $item }}
                                                <button type="button" class="btn btn-link btn-sm"
                                                    wire:click="confirmDelete('{{ $item }}','size','new')"><i
                                                        class="icon-trash
                                                mr-2"></i></button>
                                            </span>
                                        @endforeach
                                    </div>
                                    @error('listSize')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
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
                                    <button type="button" class="btn btn-danger"
                                        wire:click="CancelAddProduct">Cancel
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

    <div wire:ignore.self class="modal fade" id="viewModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="closeViewModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" wire:submit.prevent="save_image">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-semibold">Image:</label>
                                    <div class="form_group">
                                        @if ($img_path || $img_path_2)
                                            <div class="product">
                                                @if ($img_path)
                                                    <img src="{{ $img_path->temporaryUrl() }}"
                                                        class="img-fluid img-1" id="mug" alt="">
                                                @endif
                                                @if ($img_path_2)
                                                    <img src="{{ $img_path_2->temporaryUrl() }}"
                                                        class="img-fluid img-2" id="mug" alt="">
                                                @endif
                                                <div class="color" wire:ignore></div>
                                            </div>
                                        @else
                                            <img src="{{ asset('limitless/') }}/global_assets/images/placeholders/placeholder.jpg"
                                                class="img-fluid" alt="" width="50%">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="media mt-0">
                                        <div class="media-body">
                                            <div class="uniform-uploader">

                                                <input type="file" class="form-input-styled" data-fouc=""
                                                    wire:model.live="img_path"><span class="filename"
                                                    style="user-select: none;">No file
                                                    selected</span><span class="action btn bg-pink-400"
                                                    style="user-select: none;"><i wire:loading wire:target='img_path'
                                                        class="icon-spinner9 spinner mr-2"></i>Choose
                                                    File</span>
                                            </div>
                                            <span class="form-text text-muted">image : 1, Accepted formats: png, Image
                                                Product</span>
                                            @error('img_path')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="media mt-0">
                                        <div class="media-body">
                                            <div class="uniform-uploader">
                                                <input type="file" class="form-input-styled" data-fouc=""
                                                    wire:model.live="img_path_2"><span class="filename"
                                                    style="user-select: none;">No file
                                                    selected</span><span class="action btn bg-pink-400"
                                                    style="user-select: none;"><i wire:loading
                                                        wire:target='img_path_2'
                                                        class="icon-spinner9 spinner mr-2"></i>Choose
                                                    File</span>
                                            </div>
                                            <span class="form-text text-muted">image : 2, Accepted formats: png, Edit
                                                Crop Image product.<a
                                                    href="https://www.gifgit.com/image/magic-wand-tool"
                                                    target="_blank"> Online Crop Image Selection </a></span>
                                            @error('img_path_2')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @if ($img_path_2)
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" wire:model.live="color" />
                                            <span class="input-group-append">
                                                <span class="input-group-text">
                                                    <input type="color" class="color-input" value="#CCCCCC"
                                                        title="Choose a color" wire:model="color"
                                                        placeholder="PILIH">
                                                </span>
                                            </span>
                                        </div>
                                        @error('color')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="text-right">
                                            <button type="button" class="btn btn-primary" wire:click="AddColor"><i
                                                    wire:loading wire:target='color'
                                                    class="icon-spinner9 spinner mr-2"></i>Add
                                                Color <i class="icon-plus-circle2 ml-2"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <ul>
                                            @foreach ($listColor as $b)
                                                <li><span class="badge"
                                                        style="background-color: {{ $b }}; color:{{ $b }};">
                                                        = = </span>
                                                    {{ $b }} <button type="button" class="btn btn-link"
                                                        wire:click="confirmDelete('{{ $b }}','color','new')"><i
                                                            class="icon-trash
                                                        mr-2"></i></button>
                                                </li>
                                            @endforeach
                                        </ul>
                                        @error('listColor')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                @endif
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Save Image <i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="ModalSize" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Size</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="closeModalSize">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" wire:submit.prevent="save_size">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Add Size</label>
                            <div class="col-lg-10">
                                <select class="form-control" wire:model="size">
                                    <option value="XS">Choice Size</option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                    <option value="3XL">3XL</option>
                                </select>
                            </div>
                            @error('color')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Add Size <i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('css')
    <style>
        .product {
            position: relative;
            box-shadow: 0 0 2em rgba(0, 0, 0, 0.2);
            border-radius: 1em;
            overflow: hidden;
        }

        .img-1 {
            top: 0;
            left: 0;
            width: 100%;
            z-index: 0;
        }

        .img-2 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 2;
        }

        .color {
            background: rgb(250, 250, 250);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            mix-blend-mode: color-burn;
        }
    </style>
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            window.addEventListener('close-modal', event => {
                $('#viewModal').modal('hide');
            });

            window.addEventListener('show-view-modal', event => {
                $('#viewModal').modal('show');
            });

            window.addEventListener('show-size-modal', event => {
                $('#ModalSize').modal('show');
            });

            window.addEventListener('close-size-modal', event => {
                $('#ModalSize').modal('hide');
            });

            window.addEventListener('change-color', event => {
                // Get elements from the DOM
                const color = document.querySelector(".color");
                const colorInput = document.querySelector(".color-input");

                // Add input event listener
                colorInput.addEventListener("input", () => {
                    /*Set background of the color div to the color set in the input field*/
                    color.style.backgroundColor = colorInput.value;
                });
            });
        });
    </script>
@endpush
