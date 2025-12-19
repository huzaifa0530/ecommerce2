<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class FreightEstimateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $thumbnailPath;

    public function __construct($data, $thumbnailPath = null)
    {
        $this->data = $data;
        $this->thumbnailPath = $thumbnailPath;
    }

    public function build()
    {
        Log::info('Building FreightEstimateMail', [
            'data' => $this->data,
            'thumbnailPath' => $this->thumbnailPath,
        ]);

        $email = $this->subject('New Freight Estimate Request')
            ->view('emails.freight_estimate')
            ->with('data', $this->data);

        // ✅ CORRECT STORAGE PATH
        if ($this->thumbnailPath) {
            $fullPath = storage_path('app/public/' . $this->thumbnailPath);

            if (file_exists($fullPath)) {
                Log::info('Attaching thumbnail', ['path' => $fullPath]);
                $email->attach($fullPath);
            } else {
                Log::warning('Thumbnail file missing', ['expected_path' => $fullPath]);
            }
        }

        return $email;
    }
}
