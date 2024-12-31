<?php

namespace App\Listeners;

use App\Events\CourseCompleted;
use App\Mail\CourseCompletedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCourseCompletedMail implements ShouldQueue
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
    public function handle(CourseCompleted $event): void
    {
        Mail::to($event->progress->student->email)->send(new CourseCompletedMail($event->progress));
    }
}
