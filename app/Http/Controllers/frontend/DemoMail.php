<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemoMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mail;
    // public $mailData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct()
    public function __construct($mailData)
    {
        $this->mail = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from Joker')
            ->view('emails.demoMail');
    }
}
