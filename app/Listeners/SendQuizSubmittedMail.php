<?php

namespace App\Listeners;

use App\Events\QuizSubmitted;
use App\Mail\QuizSubmittedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendQuizSubmittedMail implements ShouldQueue
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
    public function handle(QuizSubmitted $event): void
    {
        Mail::to($event->result->student->email)->send(new QuizSubmittedMail($event->result));
    }
}
