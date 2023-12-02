<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Product" subjudul="Category" :breadcrumb="['Product', 'Category']" />
    </x-slot>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Category</h5>
        </div>

        <div class="card-body">
            <form action="#" wire:submit.prevent="simpan">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name:</label>
                            <div class="col-md-9">
                                {{ Form::text(null, null, [
                                    'class' => 'form-control' . ($errors->has('name') ? ' border-danger' : null),
                                    'placeholder' => 'Name Category',
                                    'wire:model.lazy' => 'name',
                                ]) }}
                                @error('name')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Image:</label>
                            <div class="col-md-9">
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" class="img-fluid img-1" id="mug"
                                        alt="" width="50%">
                                @elseif ($edit_image)
                                    <img src="{{ route('helper.show-picture', ['path' => $edit_image]) }}"
                                        class="img-fluid img-1" id="mug" alt="" width="50%">
                                @endif
                                <div class="form-group">
                                    <div class="media mt-2">
                                        <div class="media-body">
                                            <div class="uniform-uploader">
                                                <input type="file" class="form-input-styled" data-fouc=""
                                                    wire:model="image"><span class="filename"
                                                    style="user-select: none;">No file
                                                    selected</span><span class="action btn bg-pink-400"
                                                    style="user-select: none;">Choose
                                                    File</span>
                                            </div>
                                            <span class="form-text text-muted">image : 1, Accepted formats: png</span>
                                            @error('image')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="text-right">
                            @if ($isEdit)
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-danger btn-sm" wire:click="batal">Cancel
                                            <i class="icon-cancel-square ml-2"></i></button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary btn-sm">Update <i
                                                class="icon-paperplane ml-2"></i></button>
                                    </div>
                                </div>
                            @else
                                <button type="submit" class="btn btn-primary btn-sm">Save <i
                                        class="icon-paperplane ml-2"></i></button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
            @if (session()->has('success'))
                <div class="alert alert-success alert-styled-left alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                    Data saved successfully
                </div>
            @endif
            <hr>
            <livewire:admin.pages.product.category-table />
        </div>
    </div>
    <livewire:admin.global.konfirmasi-hapus />
</div>
