<?php

namespace App\Livewire\Admin\Pages\Stock;

use App\Models\Stock;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class StockIn extends Component
{
    public $isAdd, $isEdit, $product_id, $data_p, $tgl_masuk, $qty, $detail;
    protected $listeners = ['edit', 'GetProduct'];

    public $rules = [
        'tgl_masuk' => 'required',
        'product_id' => 'required',
        'qty' => 'required',
    ];
    public function AddStock()
    {
        $this->clear();
    }

    public function edit($id)
    {
        $this->isAdd = !$this->isAdd;
        $stock = Stock::find($id);
        $this->product_id = $stock->product_id;
        $this->data_p = Product::find($stock->product_id);
        $this->tgl_masuk = $stock->tgl_masuk;
        $this->detail = $stock->detail;
        $this->qty = $stock->qty;
    }

    public function AddProduct_link()
    {
        $this->dispatchBrowserEvent('show-product-modal');
    }
    public function GetProduct($id)
    {
        $this->product_id = $id;
        $this->data_p = Product::find($id);
        $this->dispatchBrowserEvent('close-product-modal');
    }
    public function closeModalProduct()
    {
        $this->dispatchBrowserEvent('close-product-modal');
    }

    public function save()
    {
        $this->validate($this->rules);
        DB::transaction(
            function () {
                Stock::create([
                    'product_id' => $this->product_id,
                    'type' => 'in',
                    'user_id' => auth()->user()->id,
                    'tgl_masuk' => $this->tgl_masuk,
                    'detail' => $this->detail,
                    'qty' => $this->qty,
                ]);
                $product = Product::find($this->product_id);

                if ($product) {
                    $newQty = $product->stock + $this->qty;

                    // Update the quantity of the product
                    $product->stock = $newQty;

                    // Save the changes to the database
                    $product->save();
                }
            }
        );
        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('success');
        $this->clear();
    }

    public function update()
    {
    }
    public function clear()
    {
        $this->data_p = '';
        $this->qty = '';
        $this->detail = '';
        $this->tgl_masuk = '';
        $this->isAdd = !$this->isAdd;
    }
    public function render()
    {
        return view('livewire.admin.pages.stock.stock-in');
    }
}
