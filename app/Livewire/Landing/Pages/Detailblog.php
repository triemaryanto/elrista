<?php

namespace App\Livewire\Landing\Pages;

use App\Models\Blog;
use Livewire\Component;

class Detailblog extends Component
{
    public $data;
    public function mount($slug)
    {
        $this->data = Blog::where('slug', $slug)->first();
    }
    public function render()
    {
        return view('livewire.landing.pages.detailblog')->layout('layouts.front.app');
    }
}
