<?php

namespace App\Console;

use App\Console\Commands\GiveCreditsToUsers;
use App\Console\Commands\ResetCreditsToUsers;
use App\Console\Commands\SendFeatured;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $dayNumberFirstTuesdayOfTheMonth = now()->firstOfMonth();

        while ($dayNumberFirstTuesdayOfTheMonth->dayOfWeek !== Carbon::TUESDAY) {
            $dayNumberFirstTuesdayOfTheMonth->addDay();
        }

        $schedule->command(SendFeatured::class)
            ->monthly()
            ->when(function () use ($dayNumberFirstTuesdayOfTheMonth) {
                return now()->isSameDay($dayNumberFirstTuesdayOfTheMonth);
            })
            ->timezone('America/Mexico_City');

        $schedule->command(ResetCreditsToUsers::class)
            ->monthly()
            ->when(function () use ($dayNumberFirstTuesdayOfTheMonth) {
                return now()->isSameDay($dayNumberFirstTuesdayOfTheMonth);
            })
            ->timezone('America/Mexico_City');


        $schedule->command(GiveCreditsToUsers::class, [
            '--credits' => 100,
        ])
            ->monthly()
            ->when(function () use ($dayNumberFirstTuesdayOfTheMonth) {
                return now()->isSameDay($dayNumberFirstTuesdayOfTheMonth);
            })
            ->timezone('America/Mexico_City');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
