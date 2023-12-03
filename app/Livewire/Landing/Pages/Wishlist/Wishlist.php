<?php

namespace App\Livewire\Landing\Pages\Wishlist;

use Livewire\Component;

class Wishlist extends Component
{
    public function render()
    {
        return view('livewire.landing.pages.wishlist.wishlist')->layout('layouts.front.app');
    }
}
