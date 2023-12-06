<?php

namespace App\Livewire\Landing\Pages\Cart;

use App\Models\Cart as ModelsCart;
use App\Models\Product;
use App\Models\ProductImageColor;
use App\Models\ProductSize;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Cart extends Component
{
    public $data, $tot, $cart, $daftar = [];

    public function getCart()
    {
        if (Auth::check()) {
            $this->data = ModelsCart::where('user_id', Auth::user()->id)->get();
        }

        if (Session::has('cart')) {
            $this->cart = session('cart');
            $this->daftar = [];
            foreach ($this->cart as $item) {
                $cb = [
                    'img1' => Product::find($item['product_id'])->gambar_satu->img1,
                    'name' => Product::find($item['product_id'])->name,
                    'qty' => $item['qty'],
                    'price' => Product::find($item['product_id'])->price,
                    'color' => ProductImageColor::find($item['color_id'])->color,
                    'size' => ProductSize::find($item['size_id'])->size,
                ];
                array_push($this->daftar, $cb);
            }
        }
    }

    public function deletecartsession($id)
    {
        Session()->pull('cart.' . $id);
        $this->getCart();
        $this->emit('GetLIst');
    }

    public function deleteCart($id)
    {
        ModelsCart::find($id)->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => '',
            'text' => 'Product successfully removed from cart...',
        ]);
        $this->emit('GetLIst');
        $this->getCart();
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
