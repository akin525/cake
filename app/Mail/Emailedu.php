<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Emailedu extends Mailable
{
    use Queueable, SerializesModels;
    protected $insert;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($insert)
    {
        $this->insert = $insert;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $insert= $this->insert;
        return $this->markdown('emails.edupin',['insert' => $insert])->subject(   $insert['username'].' |PIN|'.'Sammighty');
    }
}
