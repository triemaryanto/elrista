<?php

namespace App\Livewire\Landing\Pages\Cart;

use App\Models\Cart as ModelsCart;
use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImageColor;
use App\Models\ProductSize;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
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

    public function checkout()
    {
        if (!Auth::check()) {
            return Redirect::to('/login');
        }
        $weight = ModelsCart::join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', '=', auth()->user()->id)
            ->sum(DB::raw('products.weight * carts.qty'));

        if ($weight == 0) {
            return Redirect::to('/');
        }

        $a = Order::create([
            'user_id' => auth()->user()->id,
            'number' => time(),
            'payment_status' => 1,
            'weight' => $weight,
        ]);

        foreach ($this->data as $item) {
            DetailOrder::create([
                'order_id' => $a->id,
                'user_id' => auth()->user()->id,
                'product_id' => $item->product_id,
                'price' => $item->product->price,
                'color_id' => $item->color_id,
                'size_id' => $item->size_id,
                'qty' => $item->qty,
                'notes' => $item->notes,
            ]);
            ModelsCart::find($item->id)->delete();
        }

        return Redirect::to("/checkout/{$a->id}");
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
