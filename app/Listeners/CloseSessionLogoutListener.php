<?php

namespace App\Listeners;

use App\Events\CloseSessionLogoutEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CloseSessionLogoutListener
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
     * @param  CloseSessionLogoutEvent  $event
     * @return void
     */
    public function handle(CloseSessionLogoutEvent $event)
    {
        //
    }
}
