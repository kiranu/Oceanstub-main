<?php

namespace App\Listeners;
use Mail;
use App\Mail\Contactus;
use App\Events\ContactUsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ContactMail
{

    /**
     * Handle the event.
     *
     * @param  ContactUsEvent  $event
     * @return void
     */
    public function handle(ContactUsEvent $event)
    {
        Mail::to("Sales@Ticketor.com")->send(new Contactus($event->contact));
    }
}
