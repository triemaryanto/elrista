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
    public $isEdit, $tampilModal = false, $image, $edit_image, $data_p, $nomor, $idNya, $name, $edit_pilih;
    public $pilih = [], $listGetProduct = [
        'product_id' => '',
        'dots' => ''
    ];
    protected $listeners = ['edit', 'GetProduct', 'delete'];

    public function delete($id)
    {
        $data = Look::find($id);
        Dots::where('look_book_id', $data->id)->delete();
        $data->delete();
        $this->emit('refreshDatatable');
        $this->tampilModal = false;
    }
    public function add()
    {
        
        $this->isEdit = !$this->isEdit;
    }

    public function edit($id)
    {
        $data = Look::find($id);
        $this->name = $data->name;
        $this->edit_image = $data->image;
        $this->edit_pilih = Dots::where('look_book_id', $data->id)->get();
        foreach($this->edit_pilih as $a){
            $this->listGetProduct['dots'] = $a->dots;
            $this->listGetProduct['product_id'] = $a->product_id;
            $this->pilih[] = $this->listGetProduct;
        }
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
        $this->emit('refreshDatatable');
        $this->isEdit = false;
    }
    public function render()
    {
        return view('livewire.admin.pages.look-book');
    }
}
