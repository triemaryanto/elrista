<?php

namespace App\Livewire\Landing\Pages;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\ProductSize;
use Livewire\WithPagination;
use App\Models\ProductImageColor;

class Shop extends Component
{
    use WithPagination;
    public $limit = 12, $order = "DESC";
    public function render()
    {
        $category = Category::get();
        $colors = ProductImageColor::groupBy('color')->pluck('color');
        $sizes = ProductSize::get();
        $data = Product::with('listImage', 'listSize');
        
        $products = $data->where('status', 1)->orderBy('id', $this->order)->paginate($this->limit);;
        return view('livewire.landing.pages.shop', [
            'category' => $category,
            'colors' => $colors,
            'sizes' => $sizes,
            'products' => $products,
        ])->layout('layouts.front.app');
    }
}
