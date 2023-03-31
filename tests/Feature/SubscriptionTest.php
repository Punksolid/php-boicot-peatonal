<?php

namespace Tests\Feature;

use App\Mail\MagicLink;
use App\Models\Subscription;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    use WithFaker;
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     */
    public function test_can_subscribe(): void
    {
        $safeEmail = $this->faker->safeEmail;
        $response = $this->post(route('subscription.store'), [
            'email' => $safeEmail,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('subscriptions', [
            'email' => $safeEmail,
        ]);
    }

    public function test_a_subscriber_can_login()
    {
        \Mail::fake();
        $subscriber = Subscription::factory()->create();

        $this->post(route('login.magic'), [
            'email' => $subscriber->email,
        ]);

        \Mail::assertSent(MagicLink::class, function ($mail) use ($subscriber) {
            return $mail->hasTo($subscriber->email);
        });
    }
}
