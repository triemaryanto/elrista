<?php

namespace App\Livewire\Landing\Component;

use App\Models\Blog as ModelsBlog;
use Livewire\Component;

class Blog extends Component
{
    public $data;

    public function mount()
    {
        $this->data = ModelsBlog::inRandomOrder()->limit(3)->get();
    }

    public function render()
    {
        return view('livewire.landing.component.blog');
    }
}
