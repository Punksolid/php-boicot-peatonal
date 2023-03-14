<?php

namespace App\Listeners;

use App\Events\ProspectStoreEvent;
use App\Mail\NewProspectNotificationEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProspectStore implements ShouldQueue
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
     * @return void
     */
    public function handle( ProspectStoreEvent $prospect_store_event): void
    {
        $prospect = $prospect_store_event->prospect;

        User::verified()->get()->each(function ($user) use ($prospect) {
            \Mail::to($user->email)->send(new NewProspectNotificationEmail($prospect));
        });

    }
}
