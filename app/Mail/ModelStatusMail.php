<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ModelStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $status;

    public function __construct($name, $status)
    {
        $this->name = $name;
        $this->status = $status;
    }

    public function build()
    {
        $subject = $this->status == 'accepted'
            ? 'Your Application Has Been Accepted!'
            : 'Update on Your Application Status';

        return $this->subject($subject)
                    ->view('emails.model-status');
    }
}
