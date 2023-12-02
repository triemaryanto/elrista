<?php

namespace App\Livewire\Landing\Pages;

use Livewire\Component;

class Detailblog extends Component
{
    public function mount($slug){
        
    }
    public function render()
    {
        return view('livewire.landing.pages.detailblog')->layout('layouts.front.app');
}
}