<?php

namespace App\Console\Commands;

use App\Mail\FeaturedProspectOfTheMonth;
use App\Models\Prospect;
use App\Models\Subscription;
use App\Services\GetFeaturedProspectOfTheMonth;
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

    public function __construct(private readonly GetFeaturedProspectOfTheMonth $getFeaturedProspectOfTheMonth)
    {
        parent::__construct();
    }

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

    private function selectFeatured(): Prospect
    {
        return $this->getFeaturedProspectOfTheMonth->__invoke();

    }
}
