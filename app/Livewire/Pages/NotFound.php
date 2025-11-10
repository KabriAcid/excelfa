<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class NotFound extends Component
{
    #[\Livewire\Attributes\Layout('layouts.public')]
    public function render()
    {
        return view('livewire.pages.not-found');
    }
}
