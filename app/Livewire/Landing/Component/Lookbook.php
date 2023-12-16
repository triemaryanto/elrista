<?php

namespace App\Livewire\Landing\Component;

use App\Models\LookBook as ModelsLookBook;
use Livewire\Component;

class Lookbook extends Component
{


    public function render()
    {
        $lookbook = ModelsLookBook::with('dots')->limit(2)->orderBy('id', 'desc')->get();
        return view('livewire.landing.component.lookbook', [
            'lookbook' => $lookbook
        ]);
    }
}
