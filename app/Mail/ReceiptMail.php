<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use App\Models\Items;

class ReceiptMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $items;
    public $total;
    public $pdfAttachment;
    public $attachmentName;

    /**
     * Create a new message instance.
     *
     * @param  Order  $order
     * @param  Items  $items
     * @param  string  $total
     * @param  string  $pdfAttachment
     * @param  string  $attachmentName
     * @return void
     */
    public function __construct(Order $order, $items, $total, $pdfAttachment, $attachmentName){
        $this->order = $order;
        $this->items = $items;
        $this->total = $total;
        $this->pdfAttachment = $pdfAttachment;
        $this->attachmentName = $attachmentName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.receipt')
            ->subject('Thanks for ordering!')
            ->attachData($this->pdfAttachment, $this->attachmentName, [
                'mime' => 'application/pdf',
            ]);
    }
}
