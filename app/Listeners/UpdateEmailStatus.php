<?php

namespace App\Listeners;

use App\Models\Order;
use App\Events\InvoiceEmailSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateEmailStatus
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
    public function handle(InvoiceEmailSent $event): void
    {
        $order = Order::findOrFail($event->orderId);
        $order->email_status = 1 ;
        $order->save();
    }
}
