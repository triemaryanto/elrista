<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Account Setting" subjudul="Profile" :breadcrumb="['Profile Detail']" />
    </x-slot>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Profile Detail</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <input type="text" value="" wire:model.lazy="name" class="form-control"
                                style="text-transform:uppercase">
                        </div>

                        <div class="col-md-6">
                            <label>Number WhatsApp</label>
                            <input type="number" value="" wire:model.lazy="wa" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Photo Profile</label>
                            <input type="file" wire:model="path_photo" accept="image/png, image/jpeg"
                                class="form-control">
                        </div>
                        <div class="col-md-6">

                            @if ($path_photo)
                                <img src="{{ $path_photo->temporaryUrl() }}" width="200" height="200"
                                    class="img-fluid mx-auto d-block float-left m-2">
                            @else
                                @if ($photo ?? [])
                                    <img src="{{ route('helper.show-picture', ['path' => $photo]) }}" width="200"
                                        height="200" class="img-fluid mx-auto d-block float-left m-2">
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Ubah Akun Anda</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="saveAcc" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="@error('name')font-weight-semibold text-danger @enderror">Username</label>
                            <input type="text" value="" wire:model.lazy="name"
                                class="form-control  @error('name') border-danger @endif" readonly>
                        @error('name')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                            <label class="@error('email')font-weight-semibold text-danger @enderror">Email</label>
                            <input type="email" value="" wire:model.lazy="email"
                                class="form-control  @error('email') border-danger @endif" readonly>
                        @error('email')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label
                                        class="@error('current_password')font-weight-semibold text-danger @enderror">Password
                                        Saat Ini</label>
                                    <input type="password" value="" wire:model.lazy="current_password"
                                        class="form-control  @error('current_password') border-danger @endif">
                        @error('current_password')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                                    <label class="@error('password')font-weight-semibold text-danger @enderror">Password
                                        Baru</label>
                                    <input type="password" value="" wire:model.lazy="password"
                                        class="form-control  @error('password') border-danger @endif">
                        @error('password')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                                    <label
                                        class="@error('password_confirmation')font-weight-semibold text-danger @enderror">
                                        Ulangi Password Baru</label>
                                    <input type="password" value="" wire:model.lazy="password_confirmation"
                                        class="form-control  @error('password_confirmation') border-danger @endif">
                        @error('password_confirmation')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
            </form>
        </div>
    </div>
</div>
