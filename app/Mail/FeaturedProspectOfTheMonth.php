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
    private string $instructions;
    private ?OpenAI $openAI;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $prospect, public $chatGptLetter = null )
    {
        logger()->info('Enviando Email');
        $this->instructions = <<<TEXT
Crea un email, que invite a la persona a ir a google maps a calificar con una estrella a la empresa {$this->prospect->name},
esa empresa no es socialmente responsable y no respeta el espacio público.
Invita a el publico a decirle a sus amigos a que también califiquen negativo.
Firma la IA de BoicotPeatonal.ORG
Escribelo de forma amigable y graciosa. Si puedes aprovecha para criticar a las autoridades.
TEXT;


        $this->chatGptLetter = $this->getLetter();
        $this->title = $this->getTitle();
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->title?? null,
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

    /**
     * @return string
     */
    public function getLetter(): string
    {
        $responseContent = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $this->instructions],
            ],
        ]);

        return $responseContent->choices[0]->message->content;
    }

    public function getTitle(): string
    {
        $responseTitle = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $this->instructions],
                ['role' => 'user', 'content' => 'Escribe el titulo para el email'],
            ],
        ]);

        return $responseTitle->choices[0]->message->content;
    }
}
