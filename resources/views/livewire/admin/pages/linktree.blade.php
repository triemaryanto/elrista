<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="LinkTree" subjudul="Link" :breadcrumb="['LinkTree']" />
    </x-slot>
    <div class="card">
        <div class="card-body">
            @if ($add)
                <form action="#"
                    @if ($isEdit) wire:submit.prevent="editLinktree" @else wire:submit.prevent="saveLinktree" @endif>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tittle:</label>
                                <div class="col-md-9">
                                    {{ Form::text(null, null, [
                                        'class' => 'form-control' . ($errors->has('title') ? ' border-danger' : null),
                                        'placeholder' => 'Insert Title',
                                        'wire:model' => 'title',
                                    ]) }}
                                    @error('title')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Link:</label>
                                <div class="col-md-9">
                                    {{ Form::text(null, null, [
                                        'class' => 'form-control' . ($errors->has('link') ? ' border-danger' : null),
                                        'placeholder' => 'Insert Link',
                                        'wire:model' => 'link',
                                    ]) }}
                                    @error('link')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary btn-sm">Save<i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Background Image:</label>
                            <div class="col-md-9">

                                <input wire:model="imageback"
                                    class="form-control{{ $errors->has('imageback') ? ' border-danger' : null }}"
                                    type="file" accept="image/png, image/jpeg">
                                @error('imageback')
                                    <span class="form-text text-danger">Required Insert</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="text-right">
                            <button wire:click="saveBackground" class="btn btn-primary btn-sm"><i wire:loading
                                    wire:target='saveBackground' class="icon-spinner9 spinner mr-2"></i>Change</button>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Previous Image:</label>
                            <div class="col-md-9">

                                <img src="{{ route('helper.show-picture', ['path' => get_setting()->background_image]) }}"
                                    style="width:200px;" alt="">
                            </div>
                        </div>

                    </div>
                </div>
                <button type="button" class="btn btn-primary" wire:click='AddLinktree'>Add Linktree <i
                        class="icon-plus-circle2 ml-2"></i></button>
            @endif
            <hr>
            <livewire:admin.table.link-tree />
        </div>
    </div>
    <livewire:admin.global.konfirmasi-hapus />
</div>
