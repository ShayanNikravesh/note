<?php

namespace App\Listeners;

use App\Events\NoteStored;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendStoreNotification
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
    public function handle(NoteStored $event): void
    {
        $note = $event->note;

        $email = Auth::user()->email;

        Mail::raw(
            "Your note : ".$note->note,
            function ($message) use($email) {
                $message->to($email)->subject('New note stored');
            }
        );
    }
}
