<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Component;
use Spatie\Permission\Models\Role as ModelRole;

class Role extends Component
{
    public $name, $permission_user, $idNya, $datane;
    public $isEdit = false;

    protected $listeners = ['edit', 'delete'];

    public function add()
    {
        $this->isEdit = !$this->isEdit;
    }

    public function cancel()
    {
        $this->isEdit = !$this->isEdit;
    }
    public function edit($id)
    {
        $this->isEdit = true;
        $this->datane = ModelRole::find($id);
        $this->idNya = $this->datane->id;
        $this->permission_user = $this->datane->getPermissionNames();
        $this->name = $this->datane->name;
        $this->dispatchBrowserEvent('select2untukroleuser');
    }
    public function render()
    {
        return view('livewire.admin.pages.role');
    }
}
