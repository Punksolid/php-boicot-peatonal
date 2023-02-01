<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FeaturedProspectOfTheMonth extends Mailable
{
    use Queueable, SerializesModels;

    public $prospect;
    public $google_maps_link;
    public $facebook_link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($prospect)
    {
        $this->prospect = $prospect;
        $this->google_maps_link = $prospect->google_maps_url;
        $this->facebook_link = $prospect->facebook_url;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Una invitación a hacer una diferencia',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'mail.featured-prospect-of-the-month',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
