<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClientNotAvailable extends Mailable {

    use Queueable, SerializesModels;

    public $clientName;
    public $companyPhone;
    public $companyEmail;

    public function __construct($clientName, $companyPhone, $companyEmail)
    {
        $this->clientName = $clientName;
        $this->companyPhone = $companyPhone;
        $this->companyEmail = $companyEmail;
    }

    public function build()
    {
        return $this->view('mail.client-not-available')
            ->subject('Contact Attempt - ' . config('app.name'))
            ->with([
                'clientName' => $this->clientName,
                'companyPhone' => $this->companyPhone,
                'companyEmail' => $this->companyEmail,
            ]);
    }
}
