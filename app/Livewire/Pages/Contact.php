<?php

namespace App\Livewire\Pages;

use App\Models\ContactInquiry;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Contact extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $subject = '';
    public string $message = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|min:10',
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
                'phone' => $this->phone,
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
        $contactInfo = [
            'location' => [
                'icon' => '📍',
                'title' => 'Our Location',
                'details' => [
                    'Excel Football Academy',
                    'Jalingo, Taraba State',
                    'Nigeria',
                ],
            ],
            'phone' => [
                'icon' => '📞',
                'title' => 'Phone',
                'details' => [
                    '+234 803 456 7890',
                    '+234 809 123 4567',
                ],
            ],
            'email' => [
                'icon' => '✉️',
                'title' => 'Email',
                'details' => [
                    'info@excelfa.com',
                    'admissions@excelfa.com',
                ],
            ],
            'hours' => [
                'icon' => '🕐',
                'title' => 'Office Hours',
                'details' => [
                    'Monday - Friday: 8:00 AM - 5:00 PM',
                    'Saturday: 9:00 AM - 2:00 PM',
                    'Sunday: Closed',
                ],
            ],
        ];

        return view('livewire.pages.contact', [
            'contactInfo' => $contactInfo,
        ]);
    }
}
