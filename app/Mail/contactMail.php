<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $firstName;
    private $email;
    private $lastName;
    private $naslov;
    private $message;
    public function __construct($firstName,$lastName,$email,$naslov,$message)
    {
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->email=$email;
        $this->naslov=$naslov;
        $this->message=$message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('eshopper12341234@gmail.com')
            ->view('contactEmail',['ime'=>$this->firstName,'prezime'=>$this->lastName,'email'=>$this->email,'subject'=>$this->naslov,'poruka'=>$this->message]);
    }
}