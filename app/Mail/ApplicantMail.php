<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicantMail extends Mailable
{
    use Queueable, SerializesModels;
public $messages;
    /**
     * Create a new messages instance.
     *
     * @return void
     */
    public function __construct($messages)
    {
        $this->messages=$messages;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $messages=array(
            'name'=>$this->messages['name'],
            'email'=>$this->messages['email'],


        );
        return $this->view('frontend.mail.applicantMail')->with(['messages'=>$messages]);
    }
}
