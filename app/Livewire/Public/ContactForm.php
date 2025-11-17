<?php

namespace App\Livewire\Public;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';
    public $successMessage = false;

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'subject' => 'required|min:3',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();

        try {
            // Send email to contact email
            $contactEmail = env('MAIL_FROM_ADDRESS', 'hello@techdomain.com');

            Mail::send('emails.contact', [
                'senderName' => $this->name,
                'senderEmail' => $this->email,
                'emailSubject' => $this->subject,
                'emailMessage' => $this->message,
            ], function ($message) use ($contactEmail) {
                $message->to($contactEmail)
                    ->subject('New Contact Form Submission: ' . $this->subject)
                    ->replyTo($this->email, $this->name);
            });

            // Show success message
            $this->successMessage = true;

            // Reset form
            $this->reset(['name', 'email', 'subject', 'message']);
        } catch (\Exception $e) {
            session()->flash('error', 'There was an error sending your message. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.public.contact-form');
    }
}
