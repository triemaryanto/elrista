<?php

namespace App\Livewire\Admin\Pages\Product;

use Livewire\Component;
use Livewire\WithFileUploads;

class Product extends Component
{
    use WithFileUploads;

    public $idnya, $name, $description, $specification, $shop_info, $img_path, $color, $listColor = [];
    public $isAdd = true;
    public $isEdit = false;
    protected $listeners = ['edit', 'delete'];

    public function AddProduct()
    {
        $this->isAdd = true;
    }

    public function CancelAddProduct()
    {
        $this->isAdd = false;
    }

    public function AddImageProduct()
    {
        $this->dispatchBrowserEvent('show-view-modal');
    }

    public function AddColor()
    {
        $this->listColor[] = $this->color;
        $this->color = null;
    }

    public function closeViewModal()
    {
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        return view('livewire.admin.pages.product.product');
    }
}
