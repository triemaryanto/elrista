<div>
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>customer's Account</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!--section start-->
    <section class="login-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Costumer Profile</h3>
                    <div class="theme-card">
                        <form class="theme-form" wire:submit.prevent="save" method="POST">
                            <div class="form-group">
                                <label>Name</label>
                                {{ Form::text(null, null, [
                                    'class' => 'form-control' . ($errors->has('name') ? ' border-danger' : null),
                                    'placeholder' => 'Your Name',
                                    'wire:model' => 'name',
                                ]) }}
                                @error('name')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="review">WhatsApp</label>
                                {{ Form::number(null, null, [
                                    'class' => 'form-control' . ($errors->has('wa') ? ' border-danger' : null),
                                    'placeholder' => 'Your Whatsapp',
                                    'wire:model' => 'wa',
                                ]) }}
                                @error('wa')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="review">Photo Profile</label>
                                <input type="file" class="form-control" wire:model='photo'>
                            </div>
                            <div class="form-group">
                                @if (auth()->user()->profile_photo_path)
                                    <img src="{{ auth()->user()->profile_photo_path }}" alt="{{ auth()->user()->name }}"
                                        class="img-xs rounded-circle" />
                                @elseif($photo)
                                    <img src="{{ route('helper.show-picture', ['path' => $photo->temporaryUrl()]) }}"
                                        alt="{{ auth()->user()->name }}" class="img-xs rounded-circle" />
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                                        class="img-xs rounded-circle">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-solid">Save</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 right-login">
                    <h3>Costumer Account</h3>
                    <div class="theme-card authentication-right">
                        <form class="theme-form" wire:submit.prevent="saveAcc" method="POST">
                            <div class="form-group">
                                <label for="review">Email</label>
                                <input type="text" class="form-control" wire:model='email' wire:model='email'
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="review">New Password</label>
                                {{ Form::password(null, null, [
                                    'class' => 'form-control' . ($errors->has('password') ? ' border-danger' : null),
                                    'placeholder' => 'password',
                                    'wire:model' => 'password',
                                ]) }}
                                @error('password')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="review">Konfirm Password</label>
                                {{ Form::password(null, null, [
                                    'class' => 'form-control' . ($errors->has('password_confirmation') ? ' border-danger' : null),
                                    'placeholder' => 'Konfirm Password',
                                    'wire:model' => 'password_confirmation',
                                ]) }}
                                @error('password_confirmation')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-solid">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
</div>
