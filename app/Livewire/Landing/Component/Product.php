<?php

namespace App\Livewire\Landing\Component;

use App\Models\Product as ModelsProduct;
use Livewire\Component;

class Product extends Component
{
    public function render()
    {
        $product2 = ModelsProduct::with('listImage')->limit(6)->get();
        return view('livewire.landing.component.product', [
            'product2' => $product2
        ]);
    }
}
