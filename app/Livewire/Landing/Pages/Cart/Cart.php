<?php

namespace App\Livewire\Landing\Pages\Cart;

use Livewire\Component;

class Cart extends Component
{
    public function render()
    {
        return view('livewire.landing.pages.cart.cart')->layout('layouts.front.app');
    }
}
