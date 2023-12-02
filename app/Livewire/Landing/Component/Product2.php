<?php

namespace App\Livewire\Landing\Component;

use App\Models\Product;
use Livewire\Component;

class Product2 extends Component
{
    public function render()
    {
        $product2 = Product::with('listImage')->limit(10)->get();
        return view('livewire.landing.component.product2', [
            'product2' => $product2
        ]);
    }
}
