<?php

namespace Tests\Feature;

use App\Console\Commands\SendFeatured;
use App\Mail\FeaturedProspectOfTheMonth;
use App\Models\Prospect;
use App\Models\Subscription;
use App\Models\User;
use App\Services\GetFeaturedProspectOfTheMonth;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;

use OpenAI;
use OpenAI\Contracts\Response;
use Tests\TestCase;

use OpenAI\Responses\Completions\CreateResponse;

class SendFeaturedTest extends TestCase
{
    use WithFaker;
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_send_email_when_executing_command()
    {
        Mail::fake();

        $featuredProspectOfTheMonth = $this->createPartialMock(FeaturedProspectOfTheMonth::class, ['getLetter', 'getTitle']);

        $featuredProspectOfTheMonth
            ->expects($this->any())
            ->method('getLetter')
            ->willReturn( 'Hola' );

        $featuredProspectOfTheMonth
            ->expects($this->any())
            ->method('getTitle')
            ->willReturn( 'mundo' );

        // Create partial mock with constructor arguments
        $sendFeatured = $this->createPartialMock(SendFeatured::class, ['getMailable']);
        $sendFeatured->__construct($this->app->make(GetFeaturedProspectOfTheMonth::class));
        $sendFeatured
            ->expects($this->any())
            ->method('getMailable')
            ->willReturn($featuredProspectOfTheMonth);


        $this->instance(FeaturedProspectOfTheMonth::class, $featuredProspectOfTheMonth);
        $this->instance(SendFeatured::class, $sendFeatured);

        $subscriptor = Subscription::factory()->create();
        Prospect::factory()->create();

        Mail::assertNothingSent();
        Mail::assertNothingOutgoing();
        Mail::assertNothingQueued();
        $this->artisan('prospects:send-featured');

        Mail::assertSent(FeaturedProspectOfTheMonth::class, fn($mail) => $mail->hasTo($subscriptor->email));

    }

    public function test_get_emails()
    {
        $email = $this->faker->email;
        $subscriptor = Subscription::factory()->create(['email' => $email]);
        $register = User::factory()->create(['email' => $email]);
        $command = $this->createPartialMock(SendFeatured::class, ['handle']);

        $this->assertContains($subscriptor->email, $command->getEmails());
        $this->assertContains($register->email, $command->getEmails());
    }
}
