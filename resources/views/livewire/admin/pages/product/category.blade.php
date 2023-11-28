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
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name:</label>
                            <div class="col-md-6">
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
                    <div class="col-md-2">
                        <div class="text-right">
                            @if ($isEdit)
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-danger" wire:click="batal">Cancel <i
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
