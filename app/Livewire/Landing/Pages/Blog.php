<?php

namespace App\Livewire\Landing\Pages;

use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        return view('livewire.landing.pages.blog')->layout('layouts.front.app');
    }
}
