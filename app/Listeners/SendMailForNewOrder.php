<?php

namespace App\Listeners;

use App\Events\NewOrder;
use App\Mail\OrderMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailForNewOrder
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewOrder $event): void
    {
        $order = $event->order;
        $email = $order->user()->get()->value('email');
        Mail::to($email)->send(new OrderMail($order));

    }
}
