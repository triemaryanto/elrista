<?php

namespace App\Livewire\Landing\Component;

use App\Models\Banner;
use Livewire\Component;

class Slider extends Component
{
    public $data;
    
    public function mount()
    {
        $this->data = Banner::where('category', '1')->first();
    }

    public function render()
    {
        return view('livewire.landing.component.slider');
    }
}
