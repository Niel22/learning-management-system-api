<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuizSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Quiz Submitted Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.quiz_result',
            with: [
                'name' => $this->result->student->name,
                'course_name' => $this->result->quiz->course->title,
                'passed' => $this->result->score == $this->result->quiz->question->count() ? true : false,
                'score' => $this->result->score,
                'total' => $this->result->quiz->question->count(),
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
