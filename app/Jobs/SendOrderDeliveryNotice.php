<?php

namespace App\Jobs;

use App\Mail\MailNotice;
use App\Models\Order;
use App\Notifications\OrderDeliveryNotice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendOrderDeliveryNotice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;
    protected $total;
    protected $or;
    protected $move;
    protected $email;

    public function __construct($order, $total, $or, $move, $email)
    {
        $this->order = $order;
        $this->total = $total;
        $this->or = $or;
        $this->move = $move;
        $this->email = $email;
    }

    public function handle()
    {
//        try {
            Mail::to($this->email)->send(new MailNotice($this->order, $this->total, $this->or, $this->move));
//        } catch (\Exception $e) {
//            Log::error('SendOrderDeliveryNotice Job failed: '.$e->getMessage());
//            throw $e; // Re-throw the exception to mark the job as failed
//        }
    }
}
