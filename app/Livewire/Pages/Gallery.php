<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Gallery extends Component
{
    #[\Livewire\Attributes\Layout('layouts.public')]
    public function render()
    {
        return view('livewire.pages.gallery');
    }
}
