<?php

namespace App\Listeners;

use App\Events\SubscriberProcessed;
use App\Services\Notification\NotificationFactory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\SendMailToSubscriber;

class SendEmailSubscriber
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //        
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SubscriberProcessed  $event
     * @return void
     */
    public function handle(SubscriberProcessed $event)
    {
        dispatch(new SendMailToSubscriber([
            'subscriber' => $event->subscriber,
            'post' => $event->post
        ]));        
    }
}
