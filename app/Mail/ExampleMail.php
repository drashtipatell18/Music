<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExampleMail extends Mailable
{
    use Queueable, SerializesModels;

    public $randomNumber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->randomNumber = rand(100000, 999999); // Generate a random 6-digit number
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.example')
                    ->with(['randomNumber' => $this->randomNumber]);
    }
}

