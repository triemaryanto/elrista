<?php

namespace App\Livewire\Admin\Pages\Product;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    public $idnya, $name;
    public $isEdit = false;
    protected $listeners = ['edit', 'delete'];
    protected $rules = [
        'name' => 'required',
    ];

    public function simpan()
    {
        $this->validate();
        if ($this->idnya) {
            $this->update();
        } else {
            ModelsCategory::create(["name" => $this->name]);
            $this->name = "";
            $this->emit('refreshDatatable');
            session()->flash('success', 'Data saved successfully');
        }
    }

    public function delete($id)
    {
        $this->idnya = $id;
        ModelsCategory::destroy($id);
        $this->emit('refreshDatatable');
        $this->batal();
    }

    public function edit($id)
    {
        $a = ModelsCategory::find($id);
        $this->idnya = $a->id;
        $this->name = $a->name;
        $this->isEdit = true;
    }

    public function batal()
    {
        $this->idnya = "";
        $this->name = "";
        $this->isEdit = false;
    }

    public function update()
    {
        ModelsCategory::find($this->idnya)->update(["name" => $this->name, "slug" => null]);
        $this->idnya = "";
        $this->name = "";
        $this->isEdit = false;
        $this->emit('refreshDatatable');
        session()->flash('success', 'Data berhasil diubah.');
    }

    public function render()
    {
        return view('livewire.admin.pages.product.category');
    }
}
