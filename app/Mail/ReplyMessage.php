<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;

class ReplyMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $originalMessage;
    public $reply;

    /**
     * Create a new message instance.
     *
     * @param  App\Models\Message  $originalMessage
     * @param  string  $reply
     * @return void
     */
    public function __construct(Message $originalMessage, string $reply)
    {
        $this->originalMessage = $originalMessage;
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reply')
            ->subject('Reply to your message');
    }





    // /**
    //  * Get the message envelope.
    //  */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Reply Message',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    //  */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
