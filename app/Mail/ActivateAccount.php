<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivateAccount extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $aktivacioniKod;
    public function __construct($aktivacioniKod)
    {
        $this->aktivacioniKod=$aktivacioniKod;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from('eshopper12341234@gmail.com')
                     ->view('email',['aktivacija'=>$this->aktivacioniKod]);
    }
}
