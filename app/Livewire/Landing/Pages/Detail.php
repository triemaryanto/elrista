<?php

namespace App\Livewire\Landing\Pages;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductImageColor;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{

    public $data, $color, $image, $hallo;

    public function addwishlist()
    {
        $this->hallo = "okelah";
        $existingWishlist = Wishlist::where('product_id', $this->data->id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($existingWishlist) {
            // Data sudah ada dalam daftar Wishlist, tampilkan pesan kesalahan.
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'title' => '',
                'text' => 'Produk sudah ada dalam daftar wishlist...',
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
                'text' => 'Produk berhasil ditambahkan ke daftar wishlist...',
            ]);
        }
    }

    public function mount($slug)
    {
        $this->data = Product::with('listImage', 'listSize')->where('slug', $slug)->firstOrFail();

        $this->image = ProductImage::find($this->data->listImage[0]['id']);


        // $this->data->listImage[0]['id'];
        // ProductImageColor::where()
    }
    public function render()
    {
        return view('livewire.landing.pages.detail')->layout('layouts.front.app');
    }
}
