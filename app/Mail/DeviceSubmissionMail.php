<?php

namespace App\Mail;

use App\Models\Device;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DeviceSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $device;

    public function __construct(Device $device)
    {
        $this->device = $device;
    }

    public function build()
    {
        return $this->subject('Device Submission Confirmation')
                    ->view('emails.device_submission');
    }
}
