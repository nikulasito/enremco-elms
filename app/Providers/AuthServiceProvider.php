<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail; // Correctly import this class
use Illuminate\Support\Facades\Gate;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Notifications\Messages\MailMessage;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            // Configure Dompdf Options
            $options = new Options();
            $options->set('defaultFont', 'Courier'); // Optional: Set the default font
    
            // Initialize Dompdf
            $dompdf = new Dompdf($options);
    
            // Load the HTML content for the PDF
            $html = view('emails.registration-details', ['member' => $notifiable])->render();
            $dompdf->loadHtml($html);
    
            // Set paper size and orientation
            $dompdf->setPaper('A4', 'portrait');
    
            // Render the PDF
            $dompdf->render();
    
            // Generate the email with the PDF attachment
            $mailMessage = (new MailMessage)
                ->subject('Verify Your Email Address')
                ->markdown('vendor.notifications.email', [
                    'greeting' => 'Hello!',
                    'introLines' => ['Thank you for registering. Please verify your email by clicking the button below. Also, please print the attached PDF and submit it to the office for approval.'],
                    'actionText' => 'Verify Email',
                    'actionUrl' => $url,
                    'outroLines' => ['If you have any questions, feel free to reach out.'],
                ]);
    
            // Attach the PDF to the email
            $mailMessage->attachData($dompdf->output(), 'RegistrationDetails.pdf', [
                'mime' => 'application/pdf',
            ]);
    
            return $mailMessage;
        });
    }
}
