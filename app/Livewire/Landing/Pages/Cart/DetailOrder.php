<?php

namespace App\Livewire\Landing\Pages\Cart;

use App\Models\DetailOrder as ModelsDetailOrder;
use App\Models\Order;
use Livewire\Component;

class DetailOrder extends Component
{
    public $data,$tot;

    public function mount($idnya)
    {
        $this->data = Order::find($idnya);
    }

    public function render()
    {
        return view('livewire.landing.pages.cart.detail-order')->layout('layouts.front.app');
    }
}
