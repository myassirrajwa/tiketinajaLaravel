<?php

namespace App\Listeners;

use App\Events\userlogin;

class loginsucces
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
    public function handle(userlogin $event): void
    {
        info($event->user->name . " Berhasil Login!");
    }
}
