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
    protected $signature = 'prospects:send-featured {--dont-mark-as-featured} {--prospect-id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = <<<TEXT
It will send the Featured Prospect of the Month to all the subscribers and mark it as featured in the database.
If you want to send it to a specific prospect, use the --prospect-id option.
If you want to send it to all the subscribers but not mark it as featured, use the --dont-mark-as-featured option.
If it is already marked as featured and you want to send it again, use the --dont-mark-as-featured option.'
TEXT;

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
        $prospectId = $this->option('prospect-id');
        if ($prospectId) {
            $prospect = Prospect::find($prospectId);
        } else {
            $prospect = $this->selectFeatured();
        }

        $this->info("Featured Prospect of the Month: $prospect->name");
        $dontMarkAsFeatured = $this->option('dont-mark-as-featured');
        $emails = $this->getEmails();
        foreach ($emails as $email) {
            Log::info("Sending email to $email");
            Mail::to($email)->send($this->getMailable($prospect));
        }
        if (!$dontMarkAsFeatured) {
            $prospect->markFeatured();
        }

        return Command::SUCCESS;
    }

    public function getEmails(): array
    {
        $subscriptions_emails = Subscription::whereNotNull('verified_at')->pluck('email')->toArray();
        $users_emails = User::whereNotNull('email_verified_at')->pluck('email')->toArray();
        $emails = array_merge($subscriptions_emails, $users_emails);

        return array_unique($emails);
    }

    private function selectFeatured(): Prospect
    {
        return $this->getFeaturedProspectOfTheMonth->__invoke();
    }

    public function getMailable(Prospect $prospect): FeaturedProspectOfTheMonth
    {
        return new FeaturedProspectOfTheMonth($prospect);
    }
}
