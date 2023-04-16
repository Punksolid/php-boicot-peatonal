<?php

namespace Tests\Feature;

use App\Models\Prospect;
use App\Models\User;
use App\Services\GetFeaturedProspectOfTheMonth;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetFeaturedProspectOfTheMonthTest extends TestCase
{
//    use DatabaseMigrations;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_most_voted_prospect()
    {
        $prospects = Prospect::factory()->count(3)->create();

        $mostVoted = $prospects->first();

        /** @var User $user */
        $user = tap(User::factory()->create())->giveVoteCredits(1000);
        $user->voteOn($mostVoted,1+4+9+16+25+36+49+64+81+100);

        $prospects = (new GetFeaturedProspectOfTheMonth())->__invoke();

        $this->assertEquals(10, $mostVoted->getCountVotes());
        $this->assertEquals($mostVoted->id, $prospects->id);
    }

    /**
     *
     */
    public function test_get_featured()
    {
        $prospects = Prospect::factory()->count(3)->create();

        $prospectFeatured = $prospects->first();
        $prospectFeatured->featured_at = now()->subDay();
        $prospectFeatured->save();
        $notFeatured = $prospects->last();

        /** @var User $user */
        $user = tap(User::factory()->create())->giveVoteCredits(5000);
        $user->voteOn($prospectFeatured,1+4+9+16+25+36+49+64+81);
        $user->voteOn($notFeatured,1+4+9+16+25+36+49+64+81+100);

        $prospects = (new GetFeaturedProspectOfTheMonth())->__invoke();

        $this->assertEquals($prospectFeatured->id, $prospects->id);
        
    }
}
