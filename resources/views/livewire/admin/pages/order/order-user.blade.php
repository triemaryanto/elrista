<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Order" subjudul="User" :breadcrumb="['Order', 'User']" />
    </x-slot>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Order User</h5>
        </div>

        <div class="card-body">
            <livewire:admin.pages.order.order-user-table />
        </div>
    </div>

</div>
