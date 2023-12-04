<?php

namespace App\Livewire\Landing\Pages\Wishlist;

use App\Models\Wishlist as ModelsWishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Wishlist extends Component
{
    public $data;

    public function hapus($id)
    {
        ModelsWishlist::find($id)->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => '',
            'text' => 'Product successfully removed from wishlist...',
        ]);
    }

    public function render()
    {
        $this->data = ModelsWishlist::where('user_id', Auth::user()->id)->get();
        return view('livewire.landing.pages.wishlist.wishlist')->layout('layouts.front.app');
    }
}
