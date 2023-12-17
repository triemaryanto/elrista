<?php

namespace App\Livewire\Landing\Component;

use App\Models\Banner as ModelsBanner;
use Livewire\Component;

class Banner extends Component
{
    public $a, $b, $c;

    public function mount()
    {
        $this->a = ModelsBanner::where('category', 2)->first();
        $this->b = ModelsBanner::where('category', 3)->first();
        $this->c = ModelsBanner::where('category', 4)->first();
    }

    public function render()
    {
        return view('livewire.landing.component.banner');
    }
}
