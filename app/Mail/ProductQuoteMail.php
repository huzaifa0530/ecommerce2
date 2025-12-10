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

    public function __construct($product, $form)
    {
        $this->product = $product;
        $this->form = $form;
    }

    public function build()
    {
        $email = $this->subject('New Quotation Request - ' . $this->product->name)
                      ->view('emails.product_quote');

        // Attach uploaded files if present
        if (isset($this->form['attachment1'])) {
            $email->attach(storage_path('app/public/' . $this->form['attachment1']));
        }

        if (isset($this->form['attachment2'])) {
            $email->attach(storage_path('app/public/' . $this->form['attachment2']));
        }

        return $email;
    }
}
