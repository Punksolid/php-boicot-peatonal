<?php

namespace Tests\Feature;

use App\Mail\FeaturedProspectOfTheMonth;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ScheduleTest extends TestCase
{
    public function testSendFeaturedScheduleIsSentFirstTuesdayOfTheMonth()
    {
        // time travel fake the date to the first Tuesday of the month

        $this->travelTo(now()->firstOfMonth()->addDays(5));

        $dayNumberFirstTuesdayOfTheMonth = now()->firstOfMonth();

        while ($dayNumberFirstTuesdayOfTheMonth->dayOfWeek !== Carbon::TUESDAY) {
            $dayNumberFirstTuesdayOfTheMonth->addDay();
        }
        $this->assertSame('Tuesday', $dayNumberFirstTuesdayOfTheMonth->format('l'));
    }
}
