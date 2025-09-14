<?php

namespace App\Mail;

use App\Models\Device;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StatusUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $device;
    public $status;

    public function __construct(Device $device, $status)
    {
        $this->device = $device;
        $this->status = $status;
    }

    public function build()
    {
        return $this->subject('Device Status Update')
                    ->view('emails.status_update');
    }
}