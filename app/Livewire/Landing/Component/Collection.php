<?php

namespace App\Livewire\Landing\Component;

use App\Models\Banner;
use Livewire\Component;

class Collection extends Component
{
    public $a, $b, $c;

    public function mount()
    {
        $this->a = Banner::where('category', 5)->first();
        $this->b = Banner::where('category', 6)->first();
        $this->c = Banner::where('category', 7)->first();
    }

    public function render()
    {
        return view('livewire.landing.component.collection');
    }
}
