<?php

namespace App\Livewire\Landing\Pages;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductImageColor;
use Livewire\Component;

class Detail extends Component
{

    public $data, $color, $image;
    public function mount($slug){
        $this->data = Product::with('listImage', 'listSize')->where('slug', $slug)->firstOrFail();
        
        $this->image = ProductImage::find($this->data->listImage[0]['id']);
        
        
        // $this->data->listImage[0]['id'];
        // ProductImageColor::where()
    }
    public function render()
    {
        return view('livewire.landing.pages.detail')->layout('layouts.front.app');
    }
}
