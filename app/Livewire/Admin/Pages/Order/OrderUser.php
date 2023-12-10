<?php

namespace App\Livewire\Admin\Pages\Order;

use App\Models\Order;
use Livewire\Component;

class OrderUser extends Component
{

    protected $listeners = ['view',];

    public $order = [], $view = false;

    public function view($id)
    {
        $this->order = Order::find($id);
        $this->view = true;
    }

    public function close()
    {
        $this->order = [];
        $this->view = false;
    }

    public function render()
    {
        return view('livewire.admin.pages.order.order-user');
    }
}
