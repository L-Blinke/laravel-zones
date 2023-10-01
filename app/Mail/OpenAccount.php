<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OpenAccount extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The team invitation instance.
     *
     * @var \Laravel\Jetstream\TeamInvitation
     */
    public $temporaryPassword;

        /**
     * The team invitation instance.
     *
     * @var \Laravel\Jetstream\TeamInvitation
     */
    public $loginLink;

    /**
     * Create a new message instance.
     *
     * @param  \Laravel\Jetstream\TeamInvitation  $invitation
     * @return void
     */
    public function __construct($temporaryPassword, $loginLink)
    {
        $this->temporaryPassword = $temporaryPassword;
        $this->loginLink = $loginLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.open-account', ['loginLink' => $this->loginLink, 'password' => $this->temporaryPassword])->subject(__('Account activation'));
    }
}
