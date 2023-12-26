<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="LinkTree" subjudul="Link" :breadcrumb="['LinkTree']" />
    </x-slot>
    <div class="card">
        <div class="card-body">
            <form action="#" wire:submit.prevent="simpan">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Background Image:</label>
                            <div class="col-md-9">
                                {{ Form::file(null, null, [
                                    'class' => 'form-control' . ($errors->has('name') ? ' border-danger' : null),
                                
                                    'wire:model.lazy' => 'imageback',
                                ]) }}
                                @error('name')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-sm">Save <i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <button type="button" class="btn btn-primary" wire:click='AddLinktree'>Add Linktree <i
                    class="icon-plus-circle2 ml-2"></i></button>
            <hr>
            <livewire:admin.table.link-tree />
        </div>
    </div>
</div>
