<?php

namespace App\Livewire\Landing\Component;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    public function render()
    {
        $category1 = ModelsCategory::find(1);
        $category2 = ModelsCategory::find(2);
        $category3 = ModelsCategory::find(3);
        $category4 = ModelsCategory::find(4);
        return view('livewire.landing.component.category', [
            'category1' => $category1,
            'category2' => $category2,
            'category3' => $category3,
            'category4' => $category4,
        ]);
    }
}