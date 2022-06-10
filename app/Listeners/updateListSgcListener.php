<?php

namespace App\Listeners;

use App\Events\updateListSgcEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class updateListSgcListener
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
     * @param  updateListSgcEvent  $event
     * @return void
     */
    public function handle(updateListSgcEvent $event)
    {
        //
    }
}
