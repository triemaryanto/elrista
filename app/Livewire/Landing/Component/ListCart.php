<?php

namespace App\Livewire\Landing\Component;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListCart extends Component
{
    public $data;

    protected $listeners = ['GetLIst'];

    public function GetLIst()
    {
        $this->data = Cart::where('user_id', Auth::user()->id)->get();
    }

    public function mount()
    {
        $this->GetLIst();
    }

    public function render()
    {
        return view('livewire.landing.component.list-cart');
    }
}
