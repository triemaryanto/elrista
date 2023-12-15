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
    public $limit = 12, $order = "DESC", $id_category, $oke, $color;
    public $new, $new1;

    public function colore($color)
    {
        $this->color = $color;
    }

    public function updatedColor()
    {
        $this->dispatchBrowserEvent('change-color', [
            'color' => $this->color,
        ]);
    }

    public function updatedIdCategory($value)
    {
        $this->oke = $value;
    }

    public function mount()
    {
        $this->new = Product::inRandomOrder()->limit(3)->get();
        $this->new1 = Product::inRandomOrder()->limit(3)->get();
    }

    public function render()
    {
        $category = Category::get();
        $colors = ProductImageColor::selectRaw('color')
            ->groupBy('color')
            ->pluck('color');

        // dd($colors);

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
