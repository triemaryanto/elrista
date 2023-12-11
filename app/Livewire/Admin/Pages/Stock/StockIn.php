<?php

namespace App\Livewire\Admin\Pages\Stock;

use Livewire\Component;

class StockIn extends Component
{
    public $isAdd, $isEdit, $product_id;

    public function AddStock()
    {
        $this->isAdd = !$this->isAdd;
    }

    public function clear()
    {
        $this->isAdd = !$this->isAdd;
    }
    public function render()
    {
        return view('livewire.admin.pages.stock.stock-in');
    }
}
