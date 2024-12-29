<?php

namespace App\Listeners;

use App\Events\CourseEnrolled;
use App\Mail\CourseEnrolledMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCourseEnrolledMail implements ShouldQueue
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
    public function handle(CourseEnrolled $event): void
    {
        Mail::to($event->enrollment->student->email)->send(new CourseEnrolledMail($event->enrollment));
    }
}
