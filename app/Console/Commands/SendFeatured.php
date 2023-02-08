<?php

namespace App\Console\Commands;

use App\Mail\FeaturedProspectOfTheMonth;
use App\Models\Prospect;
use App\Models\Subscription;
use Illuminate\Console\Command;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Collection;

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

    /**
     * Execute the console command.
     */
    public function handle(Mailer $mailer): int
    {
        $prospect = $this->selectFeatured();
        $dontMarkAsFeatured = $this->option('dont-mark-as-featured');

        $mailFeatured = new FeaturedProspectOfTheMonth($prospect);

        foreach ($this->getEmails() as $email) {
            $mailFeatured->to($email);
            $mailFeatured->send($mailer);
        }

        if (!$dontMarkAsFeatured) {
            $prospect->markFeatured();
        }
        return Command::SUCCESS;
    }

    public function getEmails(): array
    {
        return Subscription::whereNotNull('verified_at')->select('email')->get()->toArray();
    }

    private function selectNewFeaturedProspect(): Prospect
    {
        return Prospect::notFeatured()->first();
    }

    private function selectFeatured(): Prospect
    {
        $featured = Prospect::featured()->first();
        if ($featured) {
            return $featured;
        }
        return $this->selectNewFeaturedProspect();
    }
}
