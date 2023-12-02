<?php

namespace App\Livewire\Landing\Pages;

use Livewire\Component;

class Detail extends Component
{
    public function render()
    {
        return view('livewire.landing.pages.detail')->layout('layouts.front.app');
    }
}
