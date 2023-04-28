<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use OpenAI\Laravel\Facades\OpenAI;

class FeaturedProspectOfTheMonth extends Mailable
{
    use Queueable, SerializesModels;

    public string $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $prospect, public $chatGptLetter = null)
    {
        logger()->info('Enviando Email');
        $instructions = <<<TEXT
Formula un email, que invite a la persona a ir a google maps o pagina en facebook y calificar con una estrella a la empresa {$this->prospect->name},
El objetivo es desincentivar a los negocios que invaden el espacio público que es de todos.
Firma la IA de BoicotPeatonal.ORG
Escribelo de forma amigable y hasta graciosa.Si puedes aprovecha para criticar a las autoridades.
TEXT;


        $responseContent = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $instructions],
            ],
        ]);

        $responseTitle = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $instructions],
                ['role' => 'user', 'content' => 'Escribe el titulo para el email'],
            ],
        ]);

        $this->chatGptLetter = $responseContent->choices[0]->message->content;
        $this->title = $responseTitle->choices[0]->message->content;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->title,
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
