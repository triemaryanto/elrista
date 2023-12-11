<?php

namespace App\Livewire\Landing\Component;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public $productId, $data;
    
    public function mount()
    {
        $this->data = Product::find($this->productId);
    }
    public function render()
    {
        return view('livewire.landing.component.product-list');
    }
}
