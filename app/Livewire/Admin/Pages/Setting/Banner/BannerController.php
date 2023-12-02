<?php

namespace App\Livewire\Admin\Pages\Setting\Banner;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class BannerController extends Component
{
    use WithFileUploads;

    public $data, $edit_image,
        $product_id, $data_p,
        $category,
        $name,
        $promo,
        $image;

    public $isAdd =  false;
    public $editForm =  false;

    public $kategori_banner = [];

    public function __construct()
    {
        $this->kategori_banner = [
            1 => ['halaman_depan_banner', 'Halaman Depan Banner', 'ukuran 1920 x 700 px', asset('multikart_all_in_one/assets/images/yoga') . "/main-banner.jpg"],
        ];
    }

    protected $listeners = ['edit', 'GetProduct'];

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

    public function AddBanner()
    {
        $this->isAdd = true;
        $this->clearForm();
    }

    public function CancelForm()
    {
        $this->isAdd = false;
        $this->clearForm();
    }

    public function clearForm()
    {
        $this->edit_image = "";
        $this->product_id = "";
        $this->category = "";
        $this->name = "";
        $this->promo = "";
        $this->image = "";
    }

    public function edit($id)
    {
        $this->isAdd = true;
        $this->editForm = true;
        $this->data = Banner::find($id);
        $this->edit_image = $this->data->image;
        $this->product_id = $this->data->product_id;
        $this->category = $this->data->category;
        $this->name = $this->data->name;
        $this->promo = $this->data->promo;
        $this->data_p = Product::find($id);
    }

    public function hapus($id)
    {
        $data = Banner::find($id);
        $data->delete();
        $this->dispatchBrowserEvent('Delete');
        $this->emit('refreshDatatable');
    }

    public function simpan()
    {
        $rules['product_id'] = 'required';
        $rules['name'] = 'required';
        $rules['promo'] = 'required';

        if (!$this->editForm) {
            $rules['image'] = 'required';
            $rules['category'] = 'required|unique:banners';
        } else {
            $rules['category'] = 'required|unique:banners,category,' . $this->data->id;
        }

        $this->validate($rules);

        try {

            if ($this->editForm) {
                $this->data->product_id = $this->product_id;
                $this->data->name = $this->name;
                $this->data->promo = $this->promo;
                $this->data->category = $this->category;
                if ($this->edit_image && $this->image) {
                    if (Storage::exists($this->edit_image)) {
                        Storage::delete($this->edit_image);
                    }
                    $this->data->image =  $this->image->store('gambar/banner');
                }
                $this->data->save();
                $filePath = Storage::path($this->data->image);
                $image = Image::make($filePath);
                list($width, $height) = getimagesize($filePath);
                $image->resize($width / 2, $height / 2);
                $image->save($filePath, 60); // Adjust quality as needed

                $this->dispatchBrowserEvent('Update');
                $this->editForm = false;
            } else {
                DB::transaction(function () {
                    $data = Banner::create([
                        'image' => $this->image->store('image/banner'),
                        'category' => $this->category,
                        'promo' => $this->promo,
                        'name' => $this->name,
                        'product_id' => $this->product_id,
                    ]);

                    $filePath = Storage::path($data->image);
                    $image = Image::make($filePath);
                    list($width, $height) = getimagesize($filePath);
                    $image->resize($width / 2, $height / 2);
                    $image->save($filePath, 60); // Adjust quality as needed
                });
                $this->dispatchBrowserEvent('Success');
            }

            $this->clearForm();
            $this->emit('refreshDatatable');
            $this->isAdd = false;
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('Error');
        }
    }

    public function render()
    {
        return view('livewire.admin.pages.setting.banner.banner-controller');
    }
}
