<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    public $users, $product, $order;

    public function mount()
    {
        $this->users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();
        $this->product = Product::get();
        $this->order = Order::whereNotIn('payment_status', [3, 4])->get();
    }

    public function render()
    {
        return view('livewire.admin.pages.home');
    }
}
