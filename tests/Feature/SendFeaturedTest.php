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
use Tests\TestCase;


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

    public function test_assert_an_already_denounced_local_is_not_sent_twice()
    {
        Mail::fake();

        $prospect = Prospect::factory()->create();
        $prospect2 = Prospect::factory()->create();
        $user = User::factory()->create();
        $user->giveVoteCredits(10000);
        $user->voteOn($prospect, 1+4+9+16+25+36+49+64+81+100);
        $user->voteOn($prospect2, 1+4+9+16+25+36+49+64+81);

        $featuredProspectOfTheMonth = $this->createPartialMock(FeaturedProspectOfTheMonth::class, ['getLetter', 'getTitle']);

        $this->instance(FeaturedProspectOfTheMonth::class, $featuredProspectOfTheMonth);
        $this->artisan('prospects:send-featured');
        Mail::assertSent(FeaturedProspectOfTheMonth::class, function ($mail) use ($prospect) {

            return $mail->prospect->name === $prospect->name;
        });

        $this->artisan('prospects:send-featured');
        Mail::assertSent(FeaturedProspectOfTheMonth::class, function ($mail2) use ($prospect2) {
            return $mail2->prospect->name === $prospect2->name;
        });

    }
}
