<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductQuoteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $form;

public function __construct($product, $form, $subject = null)
{
    $this->product = $product;
    $this->form = $form;
    $this->subjectLine = $subject;
}

    public function build()
    {
        $email = $this->subject($this->subjectLine ?? 'New Request')
            ->view('emails.product_quote');

        if (!empty($this->form['attachments'])) {
            foreach ($this->form['attachments'] as $filePath) {
                $email->attach(storage_path('app/public/' . $filePath));
            }
        }

        return $email;
    }
}
