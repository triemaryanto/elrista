<?php

namespace App\Livewire\Landing\Pages;

use App\Models\Blog as ModelsBlog;
use Livewire\Component;

class Blog extends Component
{
    public $data;

    public function mount()
    {
        $this->data = ModelsBlog::get();
    }

    public function render()
    {
        return view('livewire.landing.pages.blog')->layout('layouts.front.app');
    }
}
