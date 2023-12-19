<?php

namespace App\Livewire\Landing\Pages;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\ProductSize;
use Livewire\WithPagination;
use App\Models\ProductImageColor;

class Shop extends Component
{
    use WithPagination;
    public $limit = 24, $order = "DESC", $idCategory = [], $oke, $color, $search, $choiceSize, $choiceColor;
    public $new, $new1;

    public function colore($color)
    {
        $this->color = $color;
    }

    public function toggleColor($selectedColor)
    {
        if ($this->choiceColor === $selectedColor) {
            $this->choiceColor = null; // Unset the color if it's already selected
        } else {
            $this->choiceColor = $selectedColor; // Set the selected color
        }
    }

    public function updatedColor()
    {
        $this->dispatchBrowserEvent('change-color', [
            'color' => $this->color,
        ]);
    }

    public function updatedIdCategory()
    {
        if (!is_array($this->idCategory)) {
            return;
        }

        $this->idCategory = array_filter(
            $this->idCategory,
            function ($idCategory) {
                return $idCategory !== false;
            }
        );
    }

    public function updatedChoiceSize()
    {

        if (!is_array($this->choiceSize)) {
            return;
        }

        $this->choiceSize = array_filter(
            $this->choiceSize,
            function ($choiceSize) {
                return $choiceSize !== false;
            }
        );
    }
    public function mount()
    {
        $this->new = Product::inRandomOrder()->limit(3)->get();
        $this->new1 = Product::inRandomOrder()->limit(3)->get();
    }

    public function render()
    {
        $category = Category::get();
        $colors = ProductImageColor::get();
        $sizes = ProductSize::select('size')->groupBy('size')->get();
        $data = Product::with('gambar_Satu');

        $data->when($this->choiceSize, function ($query) {
            $query->whereHas('listSize', function ($c) {
                $c->whereIn('size', $this->choiceSize);
            });
        });

        $data->when($this->idCategory, function ($query) {
            $query->whereIn('category_id', $this->idCategory);
        });
        $data->when($this->choiceColor, function ($query) {
            // Ensure $this->choiceColor is an array before using whereHas
            $colors = is_array($this->choiceColor) ? $this->choiceColor : [$this->choiceColor];

            $query->whereHas('listImage.listColor', function ($d) use ($colors) {
                $d->whereIn('color', $colors);
            });
        });

        if ($this->search) {
            $data->where('name', 'like', "%" . $this->search . "%");
        }

        $products = $data->where('status', 1)
            ->orderBy('id', $this->order)
            ->paginate($this->limit);
        return view('livewire.landing.pages.shop', [
            'category' => $category,
            'colors' => $colors,
            'sizes' => $sizes,
            'products' => $products,
        ])->layout('layouts.front.app');
    }
}
