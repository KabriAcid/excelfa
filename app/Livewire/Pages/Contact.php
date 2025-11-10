<?php

namespace App\Livewire\Pages;

use App\Models\ContactInquiry;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

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

        try {
            // Save to database
            $inquiry = ContactInquiry::create([
                'full_name' => $this->name,
                'email' => $this->email,
                'subject' => $this->subject,
                'message' => $this->message,
                'status' => ContactInquiry::STATUS_NEW,
                'ip_address' => request()->ip(),
            ]);

            // TODO: Send email notification to admin
            // Mail::to('excelfootballa@gmail.com')->send(new ContactInquiryNotification($inquiry));

            // TODO: Send confirmation email to user
            // Mail::to($this->email)->send(new ContactInquiryConfirmation($inquiry));

            Log::info('Contact inquiry submitted', ['inquiry_id' => $inquiry->id, 'email' => $this->email]);

            $this->dispatch('notify', [
                'title' => 'Success',
                'message' => 'Your message has been sent. We will contact you soon!',
            ]);

            $this->reset();
        } catch (\Exception $e) {
            Log::error('Contact inquiry submission failed', ['error' => $e->getMessage()]);
            $this->addError('submit', 'An error occurred while processing your message. Please try again.');
        }
    }

    #[\Livewire\Attributes\Layout('layouts.public')]
    public function render()
    {
        return view('livewire.pages.contact');
    }
}
