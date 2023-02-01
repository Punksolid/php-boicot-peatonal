<?php

namespace App\Console\Commands;

use App\Mail\FeaturedProspectOfTheMonth;
use App\Models\Prospect;
use App\Models\Subscription;
use Illuminate\Console\Command;
use Illuminate\Mail\Mailer;

class SendFeatured extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prospects:send-featured';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It will send the Featured Prospect of the Month';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Mailer $mailer)
    {
        $prospect = $this->selectFeatured();

        $mailFeatured = new FeaturedProspectOfTheMonth($prospect);

        $this->getEmails()->each(function ($email) use ($mailFeatured, $mailer) {
            $mailFeatured->to($email);
            $mailFeatured->send($mailer);
        });

        $prospect->markFeatured();
        return Command::SUCCESS;
    }

    public function getEmails()
    {
        return Subscription::whereNotNull('verified_at')->get()->pluck('email');
    }

    private function selectFeatured(): Prospect
    {
        return Prospect::whereNull('featured_at')->inRandomOrder()->first();
    }
}
