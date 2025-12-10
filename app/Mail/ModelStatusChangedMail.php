<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ModelStatusChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $model;
    public $status;

    public function __construct($model, $status)
    {
        $this->model = $model;
        $this->status = $status;
    }

    public function build()
    {
        return $this->subject('Your Application Status Updated')
                    ->view('emails.model-status-changed');
    }
}
