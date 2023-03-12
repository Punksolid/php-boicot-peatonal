<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class ResetCreditsToUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'boicot-peatonal:reset-credits-to-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Puts all users credits to 0';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /** @var User $user */
        $users = User::all();
        foreach ($users as $user) {
            $user->resetVoteCredits();
            Log::info('User ' . $user->id . ' credits reset to 0');
        }

        return Command::SUCCESS;
    }
}
