<?php

namespace App\Livewire\Landing\Component;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ListCart extends Component
{
    public $data, $sub_total, $cart = [], $daftar = [];

    protected $listeners = ['GetLIst'];

    public function GetLIst()
    {
        if (Auth::check()) {
            if (Session::has('cart')) {
                $this->cart = session('cart');
                foreach ($this->cart as $item) {
                    Cart::create([
                        'user_id' => Auth::user()->id,
                        'product_id' => $item['product_id'],
                        'color_id' => $item['color_id'],
                        'size_id' => $item['size_id'],
                        'qty' => $item['qty'],
                    ]);
                }
                Session::forget('cart');
            }

            $this->data = Cart::where('user_id', Auth::user()->id)->get();
        } else if (Session::has('cart')) {
            $this->cart = session('cart');
            $this->daftar = [];
            foreach ($this->cart as $item) {
                $cb = [
                    'img1' => Product::find($item['product_id'])->gambar_satu->img1,
                    'name' => Product::find($item['product_id'])->name,
                    'qty' => $item['qty'],
                    'price' => Product::find($item['product_id'])->price,
                ];
                array_push($this->daftar, $cb);
            }
        }
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

    public function deleteCartsession($id)
    {
        Session()->pull('cart.' . $id);
        $this->GetLIst();
        $this->emit('GetLIst');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => '',
            'text' => 'Product successfully removed from cart...',
        ]);
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
