<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Contact extends Component
{
    public string $name = '';
    public string $email = '';
    public string $subject = '';
    public string $message = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|min:10',
    ];

    public function submit()
    {
        $this->validate();

        // Email would be sent here
        $this->dispatch('notify', [
            'title' => 'Success',
            'message' => 'Your message has been sent. We will contact you soon!',
        ]);

        $this->reset();
    }

    #[\Livewire\Attributes\Layout('layouts.public')]
    public function render()
    {
        return view('livewire.pages.contact');
    }
}
