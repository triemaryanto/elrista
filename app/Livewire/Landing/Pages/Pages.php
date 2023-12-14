<?php

namespace App\Livewire\Landing\Pages;

use App\Models\Page;
use Livewire\Component;

class Pages extends Component
{
    public $data;

    public function mount($slug)
    {
        $this->data = Page::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.landing.pages.pages')->layout('layouts.front.app');
    }
}
