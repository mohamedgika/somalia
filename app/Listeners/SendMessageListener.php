<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\SendMessage;

class SendMessageListener
{
    /**
     * Create the event listener.
     */

    /**
     * Handle the event.
     */
    public function handle(SendMessage $event)
    {
        // Access properties or methods of the event object correctly
        $message = $event->message->message; // Assuming `message` is a property of the `message` object

        // Now you can use $message as needed, for example, log it
        logger('Received message: ' . $message);
    }
}
