<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Dompdf\Dompdf;

class RegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $member;
    public $pdf;

    /**
     * Create a new message instance.
     */
    public function __construct($member, $pdf)
    {
        $this->member = $member;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        \Log::info('Email view being used: emails.registration');
        return $this->subject('Your Registration Details')
                    ->view('emails.registration')
                    ->attachData($this->pdf->output(), 'registration-details.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
