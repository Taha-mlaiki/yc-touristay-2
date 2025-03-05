<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationOwner extends Mailable
{
    use Queueable, SerializesModels;


    private $details;
    /**
     * Create a new message instance.
     */
    public function __construct($details)
    {
        $this->details = $details;
    }


    public function build()
    {
        $details = $this->details;
        return $this->subject("🎉 You have new reservation 🎉")
            ->view("emails.owner_recu", compact("details"));
    }
}
