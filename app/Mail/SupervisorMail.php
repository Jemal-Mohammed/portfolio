<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupervisorMail extends Mailable
{
    use Queueable, SerializesModels;
public $acount;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($acount)
    {
        $this->acount=$acount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $acount=array(
            'name'=>$this->acount['name'],
            'password'=>$this->acount['password'],
            'email'=>$this->acount['email'],

        );
        return $this->view('frontend.mail.SupervisorMail')->with([''=>$acount]);
    }
}
