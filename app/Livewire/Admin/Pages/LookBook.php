<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class LookBook extends Component
{
    use WithFileUploads;
    public $isEdit = true, $product_id, $image, $edit_image, $data_p;
protected $listeners = ['edit', 'GetProduct'];
     public function add()
    {
        $this->isEdit = !$this->isEdit;
    }

    public function cancel()
    {
        $this->isEdit = !$this->isEdit;
    }

     public function AddProduct_link()
    {
        $this->dispatchBrowserEvent('show-product-modal');
    }

     public function GetProduct($id)
    {
        $this->product_id = $id;
        $this->data_p = Product::with('gambar_satu')->find($id);
        $this->dispatchBrowserEvent('close-product-modal');
    }

    public function closeModalProduct()
    {
        $this->dispatchBrowserEvent('close-product-modal');
    }
    public function render()
    {
        return view('livewire.admin.pages.look-book');
    }
}
