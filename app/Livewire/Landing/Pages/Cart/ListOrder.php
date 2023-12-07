<?php

namespace App\Livewire\Landing\Pages\Cart;

use App\Models\Order;
use Livewire\Component;

class ListOrder extends Component
{
    public $data;

    public function sampai($id)
    {
        Order::find($id)->update(['payment_status' => 5]);
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => '',
            'text' => 'transaction is complete..',
        ]);
        $this->getData();
    }

    public function batal($id)
    {
        Order::find($id)->update(['payment_status' => 4]);
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => '',
            'text' => 'transaction is cancel..',
        ]);
        $this->getData();
    }

    public function getData()
    {
        $this->data = Order::where('user_id', auth()->user()->id)->get();
    }

    public function mount()
    {
        $this->getData();
    }

    public function render()
    {
        return view('livewire.landing.pages.cart.list-order')->layout('layouts.front.app');
    }
}
