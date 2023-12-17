<?php

namespace App\Livewire\Landing\Pages;

use Livewire\Component;

class Linktree extends Component
{
    public function render()
    {
        return view('livewire.landing.pages.linktree')->layout('layouts.link');
    }
}
