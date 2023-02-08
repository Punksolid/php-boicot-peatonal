<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    use WithFaker;
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
}
