<?php

namespace App\Livewire\Admin\Pages\Product;

use App\Models\Category as ModelsCategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Category extends Component
{
    use WithFileUploads;

    public $idnya, $name, $image, $edit_image;
    public $isEdit = false;
    protected $listeners = ['edit', 'delete'];

    public function simpan()
    {
        $rules['name'] = 'required';
        if ($this->idnya) {
            $this->validate($rules);
            $this->update();
        } else {
            $rules['image'] = 'required';
            $this->validate($rules);
            ModelsCategory::create([
                "name" => $this->name,
                'image' => $this->image->store('image/catgory'),
            ]);
            $this->name = "";
            $this->image = "";
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
        $this->edit_image = $a->image;
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
        $cari = ModelsCategory::find($this->idnya);
        $cari->name = $this->name;
        $cari->slug = null;
        if ($this->image != '') {
            if ($this->edit_image != "") {
                if (Storage::exists($this->edit_image)) {
                    Storage::delete($this->edit_image);
                }
            }
            $cari->image = $this->image->store('public/image');
        }
        $cari->save();
        $this->idnya = "";
        $this->name = "";
        $this->image = "";
        $this->edit_image = "";
        $this->isEdit = false;
        $this->emit('refreshDatatable');
        session()->flash('success', 'Data berhasil diubah.');
    }

    public function render()
    {
        return view('livewire.admin.pages.product.category');
    }
}
