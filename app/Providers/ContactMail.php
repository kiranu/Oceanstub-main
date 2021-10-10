<?php

namespace App\Providers;

use App\Providers\ContactUsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ContactMail
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
     * @param  ContactUsEvent  $event
     * @return void
     */
    public function handle(ContactUsEvent $event)
    {
        //
    }
}
