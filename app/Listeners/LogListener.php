<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Log;
use App\Events\UserLog;


class LogListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(UserLog $event)
    {
        Log::create([
            'user_id'   => auth()->user()->id,
            'log_entry' => $event->log_entry
        ]);
    }
}
