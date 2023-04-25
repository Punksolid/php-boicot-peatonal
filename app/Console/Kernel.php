<?php

namespace App\Console;

use App\Console\Commands\GiveCreditsToUsers;
use App\Console\Commands\SendFeatured;
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
        $schedule->command(SendFeatured::class)
            ->monthlyOn(1, '20:00')
            ->when(function () {
                return date('w', strtotime('first Tuesday of ' . date('F Y'))) === '2';
            })
            ->timezone('America/Mexico_City');

        $schedule->command(GiveCreditsToUsers::class, [
            '--credits' => 100,
        ])->monthlyOn(1, '20:00')
            ->when(function () {
                return date('w', strtotime('first Tuesday of ' . date('F Y'))) === '2';
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
