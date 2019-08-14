<?php

namespace App\Listeners;

use App\Events\IncidentEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncidentEventListener
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
     * @param  IncidentEvent  $event
     * @return void
     */
    public function handle(IncidentEvent $event)
    {
        return $event;
    }
}
