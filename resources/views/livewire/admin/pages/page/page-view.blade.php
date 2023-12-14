<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Page" subjudul="Page" :breadcrumb="['Page']" />
    </x-slot>

    <!-- Form inputs -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Page</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if (!$isAdd)
                {{-- <div class="text-left">
                    <button type="button" class="btn btn-primary" wire:click="add">CreatePage <i
                            class="icon-paperplane ml-2"></i></button>
                </div>
                <hr /> --}}
                <livewire:admin.pages.page.page-view-table />
            @else
                <form action="#" wire:submit.prevent="save">
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Add Page</legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Title</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Enter title..."
                                    wire:model="title">
                                @error('title')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <label class="col-form-label col-lg-2">image :</label>
                            <div class="col-lg-10">
                                @if ($picture)
                                    <img src="{{ $picture->temporaryUrl() }}" class="img-fluid" alt=""
                                        width="30%">
                                    <button type="button" wire:click="delpicture"
                                        class="btn btn-error btn-sm">delete</button>
                                @elseif ($edit_picture)
                                    <img src="{{ route('helper.show-picture', ['path' => $edit_picture]) }}"
                                        class="img-fluid" alt="" width="30%">
                                    <button type="button" wire:click="deletepicture"
                                        class="btn btn-error btn-sm">delete</button>
                                @else
                                    <img src="{{ asset('limitless/') }}/global_assets/images/placeholders/placeholder.jpg"
                                        class="img-fluid" alt="" width="30%">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Image file input</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" wire:model="picture" id="insert_pictures">
                                @error('picture')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Content</label>
                            <div class="col-lg-10">
                                <div wire:ignore>
                                    <textarea rows="3" cols="3" class="form-control" placeholder="Default textarea" id="my-editor"
                                        wire:model="content"></textarea>
                                </div>
                                @error('content')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <div class="text-right">
                        <button type="button" class="btn btn-warning" wire:click="cancel">Cancel <i
                                class="icon-paperplane ml-2"></i></button>
                        <button type="submit" class="btn btn-primary"><i wire:loading wire:target='save'
                                class="icon-spinner9 spinner mr-2"></i>Submit <i
                                class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            @endif
        </div>
    </div>
    <!-- /form inputs -->
</div>


@push('js')
    <script>
        window.addEventListener('active_ckeditor', event => {
            var konten = document.getElementById("my-editor");
            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };
            const ed = CKEDITOR.replace(konten, options);
            CKEDITOR.config.allowedContent = true;
            ed.on('change', function(event) {
                // console.log(event.editor.getData())
                @this.set('content', event.editor.getData());
            })
        });

        window.addEventListener('gambar', event => {
            $('#insert_pictures').val('');
        })
    </script>
@endpush
