<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Setting" subjudul="Web" :breadcrumb="['Setting', 'Web']" />
    </x-slot>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Setting Website</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form wire:submit.prevent="simpan" method="POST">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Judul Web :</label>
                    <div class="col-md-8">
                        {{ Form::text(null, null, [
                            'class' => 'form-control' . ($errors->has('site_name') ? ' border-danger' : null),
                            'placeholder' => 'Judul',
                            'wire:model.lazy' => 'site_name',
                        ]) }}
                        @error('site_name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Description :</label>
                    <div class="col-md-8">
                        {{ Form::text(null, null, [
                            'class' => 'form-control' . ($errors->has('description') ? ' border-danger' : null),
                            'wire:model.lazy' => 'description',
                        ]) }}
                        @error('description')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Keywords :</label>
                    <div class="col-md-8">
                        {{ Form::text(null, null, [
                            'class' => 'form-control' . ($errors->has('slogan') ? ' border-danger' : null),
                            'wire:model.lazy' => 'keywords',
                        ]) }}
                        @error('slogan')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Slogan Web :</label>
                    <div class="col-md-8">
                        {{ Form::text(null, null, [
                            'class' => 'form-control' . ($errors->has('slogan') ? ' border-danger' : null),
                            'wire:model.lazy' => 'address',
                        ]) }}
                        @error('slogan')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Phone :</label>
                    <div class="col-md-8">
                        {{ Form::text(null, null, [
                            'class' => 'form-control' . ($errors->has('phone') ? ' border-danger' : null),
                            'wire:model.lazy' => 'phone',
                        ]) }}
                        @error('phone')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Fax :</label>
                    <div class="col-md-8">
                        {{ Form::text(null, null, [
                            'class' => 'form-control' . ($errors->has('fax') ? ' border-danger' : null),
                            'wire:model.lazy' => 'fax',
                        ]) }}
                        @error('fax')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Email :</label>
                    <div class="col-md-8">
                        {{ Form::text(null, null, [
                            'class' => 'form-control' . ($errors->has('email') ? ' border-danger' : null),
                            'wire:model.lazy' => 'email',
                        ]) }}
                        @error('email')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">link_fb :</label>
                    <div class="col-md-8">
                        {{ Form::text(null, null, [
                            'class' => 'form-control' . ($errors->has('link_fb') ? ' border-danger' : null),
                            'wire:model.lazy' => 'link_fb',
                        ]) }}
                        @error('link_fb')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">link_ig :</label>
                    <div class="col-md-8">
                        {{ Form::text(null, null, [
                            'class' => 'form-control' . ($errors->has('link_ig') ? ' border-danger' : null),
                            'wire:model.lazy' => 'link_ig',
                        ]) }}
                        @error('link_ig')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">link_x :</label>
                    <div class="col-md-8">
                        {{ Form::text(null, null, [
                            'class' => 'form-control' . ($errors->has('link_x') ? ' border-danger' : null),
                            'wire:model.lazy' => 'link_x',
                        ]) }}
                        @error('link_x')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">link_linkedin :</label>
                    <div class="col-md-8">
                        {{ Form::text(null, null, [
                            'class' => 'form-control' . ($errors->has('link_linkedin') ? ' border-danger' : null),
                            'wire:model.lazy' => 'link_linkedin',
                        ]) }}
                        @error('link_linkedin')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Logo :</label>
                    <div class="col-md-6">
                        @if ($logo)
                            <img src="{{ $logo->temporaryUrl() }}" width="200"
                                class="img-fluid mx-auto d-block float-left m-2">
                        @elseif ($edit_logo != '')
                            <img src="{{ route('helper.show-picture', ['path' => $edit_logo]) }}" width="200"
                                height="200" class="img-fluid mx-auto d-block float-left m-2">
                        @endif
                        <input type="file" wire:model="logo" accept="image/png, image/jpeg" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Favicon :</label>
                    <div class="col-md-6">
                        @if ($favicon)
                            <img src="{{ $favicon->temporaryUrl() }}" width="200"
                                class="img-fluid mx-auto d-block float-left m-2">
                        @elseif ($edit_favicon != '')
                            <img src="{{ route('helper.show-picture', ['path' => $edit_favicon]) }}" width="200"
                                height="40" class="img-fluid mx-auto d-block float-left m-2">
                        @endif
                        <input type="file" wire:model="favicon" accept="image/png, image/jpeg" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-2 col-form-label">Provinsi</div>
                    <div class="col-md-6" wire:ignore>
                        <select wire:model="provinsi_id" class="form-control">
                            <option>Pilih Provinsi</option>
                            @foreach ($provinsi_list as $provinsi)
                                <option value="{{ $provinsi['province_id'] }}">
                                    {{ $provinsi['province'] }}</option>
                            @endforeach
                        </select>
                        @error('provinsi_id')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-2 col-form-label">City</div>
                    <div class="col-md-6">
                        <select wire:model="city_id" class="form-control">
                            <option>Pilih Kota</option>
                            @foreach ($city_list as $city)
                                <option value="{{ $city['city_id'] }}">
                                    {{ $city['city_name'] }}</option>
                            @endforeach
                        </select>
                        @error('provinsi_id')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
        </div>
        <div class="card-footer bg-white d-flex justify-content-between align-items-center py-2">
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <button type="submit" class="btn btn-primary text-right">Simpan</button>
                </li>
            </ul>
        </div>
        </form>
    </div>
</div>
