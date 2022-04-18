<?php

namespace App\Listeners;

use App\Events\signatureRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class sendOtp
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
     * @param  signatureRequest  $event
     * @return void
     */
    public function handle(signatureRequest $event)
    {
        Mail::to($event->data["usuario"]["email"])->send(new \App\Mail\sendOtpNotification($event));
    }
}
