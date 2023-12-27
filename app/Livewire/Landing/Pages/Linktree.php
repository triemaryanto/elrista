<?php

namespace App\Livewire\Landing\Pages;

use App\Models\Linktree as ModelsLinktree;
use Livewire\Component;

class Linktree extends Component
{
    public $data;
    public function mount()
    {
        $this->data = ModelsLinktree::get();
    }
    public function render()
    {
        return view('livewire.landing.pages.linktree')->layout('layouts.link');
    }
}
