<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Dashboard" subjudul="Dasboard" :breadcrumb="[]" />
    </x-slot>
    <div class="card">
        <div class="card-body">
            <livewire:admin.table.user-list />
        </div>
    </div>
</div>
