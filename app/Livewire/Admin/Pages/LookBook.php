<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Dots;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\LookBook as Look;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\LookBook as ModelsLookBook;

class LookBook extends Component
{
    use WithFileUploads;
    public $isEdit, $tampilModal = false, $image, $edit_image, $data_p, $nomor, $idNya, $name;
    public $pilih = [], $listGetProduct = [
        'product_id' => '',
        'dots' => ''
    ];

    public $edit_pilih = [], $edit_listGetProduct = [
        'id' => '',
        'product_id' => '',
        'dots' => ''
    ];
    protected $listeners = ['edit', 'GetProduct', 'delete'];

    public $rules = [
        'name' => 'required'
    ];
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

        $this->isEdit = !$this->isEdit;`
    }

    public function edit($id)
    {
        $data = Look::find($id);
        $this->idNya = $data->id;
        $this->name = $data->name;
        $this->edit_image = $data->image;
        $b = Dots::where('look_book_id', $data->id)->get();
        foreach ($b as $a) {
            $this->edit_listGetProduct['id'] = $a->id;
            $this->edit_listGetProduct['dots'] = $a->dots;
            $this->edit_listGetProduct['product_id'] = $a->product_id;
            $this->edit_pilih[] = $this->edit_listGetProduct;
        }
        $this->isEdit = !$this->isEdit;
    }
    public function cancel()
    {
        $this->isEdit = !$this->isEdit;
        $this->image = '';
        $this->listGetProduct = [];
        $this->pilih = [];
        $this->name = '';
        $this->idNya = '';
        $this->nomor = '';
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
        $filePath = Storage::path($gambar_lookbook);
        $image = Image::make($filePath);
        list($width, $height) = getimagesize($filePath);
        $sizeInBytes = Storage::size($gambar_lookbook);
        if ($sizeInBytes > 2048) {
            $a = 4;
        } else if ($sizeInBytes > 1024) {
            $a = 2;
        } else {
            $a = 2;
        }
        $image->resize($width / $a, $height / $a);
        $image->save($filePath, 60); // Adjust quality as needed

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

    public function update()
    {

        $a = look::find($this->idNya);
        $a->name = $this->name;

        if ($this->image) {
            $gambar_lookbook = $this->image->store('lookbook/image');
            $a->image = $gambar_lookbook;
        }
        $a->save();
        $this->dispatchBrowserEvent('Update');
        $this->emit('refreshDatatable');
        $this->isEdit = false;
    }
    public function render()
    {
        return view('livewire.admin.pages.look-book');
    }
}
