<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Dots;
use App\Models\LookBook as ModelsLookBook;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class LookBook extends Component
{
    use WithFileUploads;
    public $isEdit, $tampilModal = false, $image, $edit_image, $data_p, $pilih = [], $nomor, $idNya, $name;
    public $listGetPRoduct = [
        'product_id' => '',
        'dots' => ''
    ];
    protected $listeners = ['edit', 'GetProduct'];
     public function add()
    {
        $this->isEdit = !$this->isEdit;
    }

    public function edit(){
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
        
        $this->data_p = Product::with('gambar_satu')->find($id);
        $this->listGetPRoduct['product_id'] = $id;
        $this->listGetPRoduct['dots'] = $this->nomor;

        array_push($this->pilih, $this->listGetPRoduct,);
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
        $this->listGetPRoduct = [];
        $this->idNya = '';
        $this->nomor = '';
    }
    public function closeModalProduct()
    {
        $this->dispatchBrowserEvent('close-product-modal');
    }

    public function save(){
        $gambar_lookbook = $this->image->store('lookbook/image');
        $lookbook = ModelsLookBook::create([
            "name" => $this->name,
            "image" => $gambar_lookbook
        ]);
        foreach($this->pilih as $item){
            $a['product_id'] = $item['product_id'];
            $a['dots'] = $item['dots'];
            $a['look_book_id'] = $lookbook->id;
            Dots::create($a);
        }
        $this->image = '';
        $this->listGetPRoduct = [];
        $this->idNya = '';
        $this->nomor = '';
        $this->dispatchBrowserEvent('Success');
    }
    public function render()
    {
        return view('livewire.admin.pages.look-book');
    }
}
