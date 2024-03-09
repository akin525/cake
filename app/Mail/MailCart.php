<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailCart extends Mailable
{
    use Queueable, SerializesModels;
    protected $input;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input, $amount)
    {
        $this->input = $input;
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.cart', ['input' => $this->input, 'amount' => $this->amount])
            ->subject('New Cart Added');
    }

}
