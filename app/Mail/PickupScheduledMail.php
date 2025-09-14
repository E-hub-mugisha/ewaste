<?php

namespace App\Mail;

use App\Models\DevicePickup;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PickupScheduledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pickup;

    public function __construct(DevicePickup $pickup)
    {
        $this->pickup = $pickup;
    }

    public function build()
    {
        return $this->subject('Pickup Scheduled')
                    ->view('emails.pickup_scheduled');
    }
}
