<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class GiveCreditsToUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'boicot-peatonal:give-credits-to-users {--credits=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Give credits to users --credits=100 option';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $credits = $this->option('credits');
        if (!$credits) {
            $this->error('You must provide the credits option');
            return Command::FAILURE;
        }

        $users = User::all();
        foreach ($users as $user) {
            $user->giveVoteCredits($credits);
        }

        return Command::SUCCESS;
    }
}
