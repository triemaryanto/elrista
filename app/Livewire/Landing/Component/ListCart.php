<?php

namespace App\Livewire\Landing\Component;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListCart extends Component
{
    public $data, $sub_total;

    protected $listeners = ['GetLIst'];

    public function GetLIst()
    {
        $this->data = Cart::where('user_id', Auth::user()->id)->get();
    }

    public function deleteCart($id)
    {
        Cart::find($id)->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => '',
            'text' => 'Product successfully removed from cart...',
        ]);
        $this->GetLIst();
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
