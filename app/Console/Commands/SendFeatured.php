<?php

namespace App\Console\Commands;

use App\Mail\FeaturedProspectOfTheMonth;
use App\Models\Prospect;
use App\Models\Subscription;
use App\Models\User;
use App\Services\GetFeaturedProspectOfTheMonth;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Log;

class SendFeatured extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prospects:send-featured {--dont-mark-as-featured}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It will send the Featured Prospect of the Month';

    public function __construct(
        private readonly GetFeaturedProspectOfTheMonth $getFeaturedProspectOfTheMonth)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $prospect = $this->selectFeatured();
        $dontMarkAsFeatured = $this->option('dont-mark-as-featured');
        $emails = $this->getEmails();
        foreach ($emails as $email) {
            Log::info("Sending email to $email");
            Mail::to($email)->send(new FeaturedProspectOfTheMonth($prospect));
        }

        if (!$dontMarkAsFeatured) {
            $prospect->markFeatured();
        }
        return Command::SUCCESS;
    }

    public function getEmails(): array
    {
        $subscriptors_emails = Subscription::whereNotNull('verified_at')->pluck('email')->toArray();
        $users_emails = User::whereNotNull('email_verified_at')->pluck('email')->toArray();
        $emails = array_merge($subscriptors_emails, $users_emails);

        return array_unique($emails);
    }

    private function selectFeatured(): Prospect
    {
        return $this->getFeaturedProspectOfTheMonth->__invoke();
    }
}
