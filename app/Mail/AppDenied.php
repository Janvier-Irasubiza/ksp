<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppDenied extends Mailable {

    use Queueable, SerializesModels;

    public $clientName;
    public $appName;
    public $denialReason;
    public $companyPhone;
    public $companyEmail;

    public function __construct($clientName, $appName, $denialReason, $companyPhone, $companyEmail)
    {
        $this->clientName = $clientName;
        $this->appName = $appName;
        $this->denialReason = $denialReason;
        $this->companyPhone = $companyPhone;
        $this->companyEmail = $companyEmail;
    }

    public function build()
    {
        return $this->view('mail.app-denied')
            ->subject('Application denied - ' . config('app.name'))
            ->with([
                'clientName' => $this->clientName,
                'appName' => $this->appName,
                'denialReason' => $this->denialReason,
                'companyPhone' => $this->companyPhone,
                'companyEmail' => $this->companyEmail,
            ]);
    }
}
