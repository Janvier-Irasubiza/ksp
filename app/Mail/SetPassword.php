<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SetPassword extends Mailable {

    use Queueable, SerializesModels;

    public $agentName;
    public $promo_code;
    public $passwordResetLink;
    public $supportEmail;
    public $supportPhone;

    public function __construct($agentName, $promo_code, $passwordResetLink, $supportEmail, $supportPhone) {
        $this->agentName = $agentName;
        $this->promo_code = $promo_code;
        $this->passwordResetLink = $passwordResetLink;
        $this->supportEmail = $supportEmail;
        $this->supportPhone = $supportPhone;
    }

    public function build() {
        return $this->view('mail.set-password')
            ->subject('Action Required: Set Your Password for ' . config('app.name') . ' Account')
            ->with([
                'agentName' => $this->agentName,
                'promo_code' => $this->promo_code,
                'passwordResetLink' => $this->passwordResetLink,
                'supportEmail' => $this->supportEmail,
                'supportPhone' => $this->supportPhone,
            ]);
    }
}