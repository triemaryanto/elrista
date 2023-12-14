<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Dots;
use App\Models\Product;
use Livewire\Component;
use App\Models\LookBook as Look;
use Livewire\WithFileUploads;
use App\Models\LookBook as ModelsLookBook;

class LookBook extends Component
{
    use WithFileUploads;
    public $isEdit, $tampilModal = false, $image, $edit_image, $data_p, $nomor, $idNya, $name;
    public $pilih = [], $listGetProduct = [
        'product_id' => '',
        'dots' => ''
    ];
    protected $listeners = ['edit', 'GetProduct', 'delete'];

    public function delete($id)
    {
        $data = Look::find($id);


        // Use the Eloquent query builder to delete Dots records where 'look_book_id' matches $data->id
        Dots::where('look_book_id', $data->id)->delete();

        // Optionally, you can also delete the Look model itself
        $data->delete();
    }
    public function add()
    {
        $this->isEdit = !$this->isEdit;
    }

    public function edit()
    {
        $this->isEdit = !$this->isEdit;
    }
    public function cancel()
    {
        $this->isEdit = !$this->isEdit;
    }

    public function AddProduct_link($id)
    {
        $this->nomor = $id;
        $this->dispatchBrowserEvent('show-product-modal');
    }

    public function GetProduct($id)
    {
        $this->listGetProduct['product_id'] = $id;
        $this->listGetProduct['dots'] = $this->nomor;
        $this->pilih[] = $this->listGetProduct;
        $this->dispatchBrowserEvent('close-product-modal');
    }

    public function KonfirmasiHapus($id)
    {
        $this->idNya = $id;
        $this->tampilModal = true;
    }

    public function Kofirm()
    {
        unset($this->pilih[$this->idNya]);
        $this->tampilModal = false;
        $this->listGetProduct = [];
        $this->idNya = '';
        $this->nomor = '';
    }
    public function closeModalProduct()
    {
        $this->dispatchBrowserEvent('close-product-modal');
    }

    public function save()
    {
        $gambar_lookbook = $this->image->store('lookbook/image');
        $lookbook = ModelsLookBook::create([
            "name" => $this->name,
            "image" => $gambar_lookbook
        ]);
        foreach ($this->pilih as $item) {
            $a['product_id'] = $item['product_id'];
            $a['dots'] = $item['dots'];
            $a['look_book_id'] = $lookbook->id;
            Dots::create($a);
        }
        $this->image = '';
        $this->listGetProduct = [];
        $this->pilih = [];
        $this->name = '';
        $this->idNya = '';
        $this->nomor = '';
        $this->dispatchBrowserEvent('Success');
        $this->isEdit = false;
    }
    public function render()
    {
        return view('livewire.admin.pages.look-book');
    }
}
