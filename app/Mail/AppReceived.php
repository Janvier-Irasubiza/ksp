<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppReceived extends Mailable {

    use Queueable, SerializesModels;

    public $clientName;
    public $appName;
    public $companyPhone;
    public $companyEmail;

    public function __construct($clientName, $appName=null, $companyPhone, $companyEmail)
    {
        $this->clientName = $clientName;
        $this->appName = $appName;
        $this->companyPhone = $companyPhone;
        $this->companyEmail = $companyEmail;
    }

    public function build()
    {
        return $this->view('mail.app-received')
            ->subject('Application Received - ' . config('app.name'))
            ->with([
                'clientName' => $this->clientName,
                'appName' => $this->appName,
                'companyPhone' => $this->companyPhone,
                'companyEmail' => $this->companyEmail,
            ]);
    }
}
