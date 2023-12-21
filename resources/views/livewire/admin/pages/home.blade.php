<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Dashboard" subjudul="Dasboard" :breadcrumb="[]" />
    </x-slot>

    <div class="row">
        <div class="col-lg-2">
            <div class="card card-body border-top-primary">
                <div class="text-center">
                    <b><i class="icon-users icon-3x"></i></b>
                    <p class="text-muted mt-2">Total User</p>
                    <p class="text-muted mb-3"><b>{{ $users->count() }}</b></p>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="card card-body border-top-warning">
                <div class="text-center">
                    <b><i class="icon-grid5 icon-3x"></i></b>
                    <p class="text-muted mt-2">Total Product</p>
                    <p class="text-muted mb-3"><b>{{ $product->count() }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="card card-body border-top-info">
                <div class="text-center">
                    <b><i class="icon-cart5 icon-3x"></i></b>
                    <p class="text-muted mt-2">Total Order</p>
                    <p class="text-muted mb-3"><b>{{ $order->count() }}</b></p>
                </div>
            </div>
        </div>
    </div>

</div>
