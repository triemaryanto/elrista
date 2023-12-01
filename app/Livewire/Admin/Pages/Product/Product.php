<?php

namespace App\Livewire\Admin\Pages\Product;

use App\Models\Category;
use App\Models\Product as ModelsProduct;
use App\Models\ProductImage;
use App\Models\ProductImageColor;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Product extends Component
{
    use WithFileUploads;

    public $idnya, $listCategory, $category, $name, $description, $specification, $shop_info, $img_path, $img_path_2, $color, $listColor = [], $listImage = [], $price, $status = false, $editListImage = [];
    public $isAdd = false;
    public $isEdit = false;
    protected $listeners = ['edit', 'delete'];

    public function AddProduct()
    {
        $this->isAdd = true;
    }

    public function CancelAddProduct()
    {
        $this->isAdd = false;
        $this->name = null;
        $this->description = null;
        $this->specification = null;
        $this->shop_info = null;
        $this->status = false;
        $this->isAdd = false;
        $this->isEdit = false;
        $this->listImage = [];
        $this->editListImage = [];
    }

    public function AddImageProduct()
    {
        $this->dispatchBrowserEvent('show-view-modal');
    }

    public function AddColor()
    {
        $rules['color'] = 'required';
        $this->validate($rules);
        $this->listColor[] = $this->color;
        $this->color = null;
    }

    public function closeViewModal()
    {
        $this->dispatchBrowserEvent('close-modal');
    }

    public function updatedColor()
    {
        $this->dispatchBrowserEvent('change-color');
    }

    public function save_image()
    {
        $rules['img_path'] = 'required';
        $rules['img_path_2'] = 'required';
        $rules['listColor'] = 'required';
        $this->validate($rules);

        $maxId = count($this->listImage) > 0 ? max(array_column($this->listImage, 'id')) : 0;
        $maxId++;
        $this->listImage[] = [
            'id' => $maxId,
            'img1' => $this->img_path,
            'img2' => $this->img_path_2,
            'color' => $this->listColor,
        ];
        $this->img_path = null;
        $this->img_path_2 = null;
        $this->listColor = [];
        $this->dispatchBrowserEvent('close-modal');
    }

    public function confirmDelete($id, $from, $action)
    {
        if ($from == 'color' && $action == 'new') {
            $this->deleteColor($id, $action);
        }
        if ($from == 'image' && $action == 'new') {
            $this->deleteImage($id, $action);
        }
        if ($from == 'image' && $action == 'edit') {
            $this->deleteImageEdit($id);
        }
    }

    public function deleteColor($id, $action)
    {
        if ($action == 'new') {
            $this->listColor = array_values(array_filter($this->listColor, function ($color) use ($id) {
                return $color !== $id;
            }));
        }
    }

    public function deleteImageEdit($id)
    {
        $data = ProductImage::find($id);
        $data->delete();
        ProductImageColor::where('product_image_id', $id)->delete();
        $this->getImage($this->idnya);
    }

    public function deleteImage($id, $action)
    {
        if ($action == 'new') {
            $this->listImage = array_filter($this->listImage, function ($item) use ($id) {
                return $item['id'] !== $id;
            });
        }
    }

    public function save()
    {
        $rules['category'] = 'required';
        $rules['name'] = 'required';
        $rules['description'] = 'required';
        $rules['specification'] = 'required';
        $rules['shop_info'] = 'required';
        $rules['price'] = 'required';
        if ($this->isEdit) {
            $this->validate($rules);
            $data = ModelsProduct::find($this->idnya);
            $data->category_id = $this->category;
            $data->name = $this->name;
            $data->slug = null;
            $data->description = $this->description;
            $data->specification = $this->specification;
            $data->shop_info = $this->shop_info;
            $data->status = $this->status;
            $data->price = $this->price;
            foreach ($this->listImage as $item) {
                $a = ProductImage::create([
                    'product_id' => $data->id,
                    'img1' => $item['img1']->store('gambar/produk'),
                    'img2' => $item['img2']->store('gambar/produk'),
                ]);
                foreach ($item['color'] as $col) {
                    ProductImageColor::create([
                        'product_image_id' => $a->id,
                        'color' => $col
                    ]);
                }
            }
            $data->save();
            $this->emit('refreshDatatable');
            session()->flash('success', 'Data updated successfully');
            $this->name = null;
            $this->description = null;
            $this->specification = null;
            $this->shop_info = null;
            $this->status = false;
            $this->isAdd = false;
            $this->isEdit = false;
            $this->listImage = [];
            $this->editListImage = [];
        } else {
            $rules['listImage'] = 'required';
            $this->validate($rules);
            DB::transaction(function () {
                $produk = ModelsProduct::create([
                    'category_id' => $this->category,
                    'name' => $this->name,
                    'description' => $this->description,
                    'specification' => $this->specification,
                    'shop_info' => $this->shop_info,
                    'price' => $this->price,
                    'status' => $this->status,
                ]);

                foreach ($this->listImage as $item) {
                    $a = ProductImage::create([
                        'product_id' => $produk->id,
                        'img1' => $item['img1']->store('gambar/produk'),
                        'img2' => $item['img2']->store('gambar/produk'),
                    ]);
                    foreach ($item['color'] as $col) {
                        ProductImageColor::create([
                            'product_image_id' => $a->id,
                            'color' => $col
                        ]);
                    }
                }
            });
            $this->emit('refreshDatatable');
            session()->flash('success', 'Data saved successfully');
            $this->name = null;
            $this->description = null;
            $this->specification = null;
            $this->shop_info = null;
            $this->status = false;
            $this->isAdd = false;
            $this->listImage = [];
        }
    }

    public function edit($id)
    {
        $data = ModelsProduct::find($id);
        $this->idnya = $id;
        $this->category = $data->category_id;
        $this->name = $data->name;
        $this->description = $data->description;
        $this->specification = $data->specification;
        $this->shop_info = $data->shop_info;
        $this->price = $data->price;
        $this->status = $data->status ? true : false;
        $this->getImage($id);
        $this->isAdd = true;
        $this->isEdit = true;
    }

    public function getImage($id)
    {
        $this->editListImage = ProductImage::where('product_id', $id)->get();
    }

    public function delete($id)
    {
        $data = ModelsProduct::find($id);
        $data->delete();
        $img = ProductImage::where('product_id', $id)->get();
        foreach ($img as $a) {
            ProductImageColor::where('product_image_id', $a->id)->delete();
        }
        ProductImage::where('product_id', $id)->delete();
        $this->emit('refreshDatatable');
        session()->flash('success', 'Data Delete successfully');
    }

    public function mount()
    {
        $this->listCategory = Category::get();
    }

    public function render()
    {
        return view('livewire.admin.pages.product.product');
    }
}
