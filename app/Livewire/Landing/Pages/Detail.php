<?php

namespace App\Livewire\Landing\Pages;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductImageColor;
use App\Models\ProductSize;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Detail extends Component
{

    public $data, $color, $image, $color_id, $size_id, $qty = 1, $retaled;

    public function addColor($id)
    {
        $this->color_id = $id;
        $data = ProductImageColor::find($id);
        $this->dispatchBrowserEvent('add-color', [
            'id' => 'color-' . $id,
            'color' => $data->color,
        ]);
    }

    public function addSize($id)
    {
        $this->size_id = $id;
        $data = ProductSize::find($id);
        $this->dispatchBrowserEvent('add-size', [
            'id' => 'size-' . $id,
            'size' => $data->size,
        ]);
    }

    public function addwishlist()
    {
        $existingWishlist = Wishlist::where('product_id', $this->data->id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($existingWishlist) {
            // Data sudah ada dalam daftar Wishlist, tampilkan pesan kesalahan.
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'title' => '',
                'text' => 'The product is already on the wishlist...',
            ]);
        } else {
            // Data belum ada dalam daftar Wishlist, tambahkan data baru.
            Wishlist::create([
                'product_id' => $this->data->id,
                'user_id' => Auth::user()->id,
            ]);
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => '',
                'text' => 'Product successfully added to wishlist...',
            ]);
        }
    }

    public function addCart()
    {
        $rules['color_id'] = 'required';
        $rules['size_id'] = 'required';
        $this->validate($rules);
        if (Auth::check()) {
            DB::transaction(function () {
                Cart::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $this->data->id,
                    'color_id' => $this->color_id,
                    'size_id' => $this->size_id,
                    'qty' => $this->qty,
                ]);

                $this->emit('GetLIst');
                $this->dispatchBrowserEvent('swal:modal', [
                    'type' => 'success',
                    'title' => '',
                    'text' => 'Product successfully added to cart...',
                ]);
            });
        } else {
            // Session::forget('cart');
            if (Session::has('cart')) {
                $cart = [
                    'product_id' => $this->data->id,
                    'color_id' => $this->color_id,
                    'color' => ProductImageColor::find($this->color_id)->pluck('color'),
                    'namecolor' => ProductImageColor::find($this->color_id)->pluck('namecolor'),
                    'size_id' => $this->size_id,
                    'size' => ProductSize::find($this->color_id)->pluck('size'),
                    'qty' => $this->qty,
                ];
                Session()->push('cart', $cart);
            } else {
                $cart[] = [
                    'product_id' => $this->data->id,
                    'color_id' => $this->color_id,
                    'color' => ProductImageColor::find($this->color_id)->pluck('color'),
                    'namecolor' => ProductImageColor::find($this->color_id)->pluck('namecolor'),
                    'size_id' => $this->size_id,
                    'size' => ProductSize::find($this->size_id)->pluck('size'),
                    'qty' => $this->qty,
                ];
                session(['cart' => $cart]);
            }
            $this->emit('GetLIst');
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => '',
                'text' => 'Product successfully added to cart...',
            ]);
        }
    }

    public function mount($slug)
    {
        $this->data = Product::with('listImage', 'listSize')->where('slug', $slug)->firstOrFail();

        $this->image = ProductImage::find($this->data->listImage[0]['id']);

        $this->retaled = Product::inRandomOrder()->limit(6)->get();


        // $this->data->listImage[0]['id'];
        // ProductImageColor::where()
    }
    public function render()
    {
        return view('livewire.landing.pages.detail')->layout('layouts.front.app');
    }
}
