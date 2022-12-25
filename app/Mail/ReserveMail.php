<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReserveMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reserves;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reserves)
    {
        $this->reserves = $reserves;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reservemail')
                        ->subject('予約確認')
                        ->with([

                            'reserves' => $this->reserves,
                        ]);
    }
}
