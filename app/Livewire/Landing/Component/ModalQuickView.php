<?php

namespace App\Livewire\Landing\Component;

use App\Models\Product;
use Livewire\Component;

class ModalQuickView extends Component
{
    protected $listeners = ['showModal'];

    public $data;

    public function showModal($id)
    {
        $this->data = Product::find($id);
        $this->dispatchBrowserEvent('modalquickview');
    }

    public function closeModal()
    {
        $this->data = null;
        $this->dispatchBrowserEvent('close-smodalquickview');
    }

    public function render()
    {
        return view('livewire.landing.component.modal-quick-view');
    }
}
