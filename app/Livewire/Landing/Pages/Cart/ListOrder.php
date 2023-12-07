<?php

namespace App\Livewire\Landing\Pages\Cart;

use Livewire\Component;

class ListOrder extends Component
{
    public function render()
    {
        return view('livewire.landing.pages.cart.list-order')->layout('layouts.front.app');
    }
}
