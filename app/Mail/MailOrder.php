<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailOrder extends Mailable
{
    use Queueable, SerializesModels;
    protected $input;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $total, $or)
    {
        $this->order = $order;
        $this->total = $total;
        $this->or = $or;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.order', ['order' => $this->order, 'total' => $this->total, 'or'=>$this->or])
            ->subject('New Order');
    }

}
