<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class OrderDeliveryNotice extends Notification implements ShouldQueue, \Illuminate\Contracts\Mail\Mailable
{
    use Queueable;

    protected $order;
    protected $total;
    protected $or;
    protected $move;

    public function __construct($order, $total, $or, $move)
    {
        $this->order = $order;
        $this->total = $total;
        $this->or = $or;
        $this->move = $move;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Eko Cakes Order Confirmation')
            ->view('emails.notice', [
                'order' => $this->order,
                'total' => $this->total,
                'or' => $this->or,
                'move' => $this->move,
            ]);
    }
}
