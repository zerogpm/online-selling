<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\{User, Listing};

class ListingContactCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $listing;

    public $sender;

    public $body;

    /**
     * ListingContactCreated constructor.
     * @param Listing $listing
     * @param User $sender
     * @param $message
     */
    public function __construct(Listing $listing, User $sender, $body)
    {
        $this->listing = $listing;
        $this->sender = $sender;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.listing.contact.message')
            ->subject("{$this->sender->name} sent a message about {$this->listing->title}")
            ->from('Hello@fresh.com')
            ->replyTo($this->sender->email);
    }
}
