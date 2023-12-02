<?php

namespace App\Livewire\Landing\Pages;

use Livewire\Component;

class Shop extends Component
{
    public function render()
    {
        return view('livewire.landing.pages.shop')->layout('layouts.front.app');
    }
}
