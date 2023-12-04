<?php

namespace App\Livewire\Landing\Pages\Cart;

use App\Models\Cart as ModelsCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    public $data, $tot;

    public function getCart()
    {
        $this->data = ModelsCart::where('user_id', Auth::user()->id)->get();
    }

    public function mount()
    {
        $this->getCart();
    }

    public function render()
    {
        return view('livewire.landing.pages.cart.cart')->layout('layouts.front.app');
    }
}
