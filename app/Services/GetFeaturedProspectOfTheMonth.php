<?php

namespace App\Services;

use App\Models\Prospect;
use App\Models\User;
use LaravelQuadraticVoting\Services\QuadraticVoteService;

class GetFeaturedProspectOfTheMonth
{

    public function __invoke(): ?Prospect
    {
        $getFeaturedProspectOfTheMonth = $this->getNewFeaturedProspectOfTheMonth();

        if (!$getFeaturedProspectOfTheMonth) {
            $newFeaturedProspect = $this->selectNewFeaturedProspect();


            if (!$newFeaturedProspect instanceof Prospect) {
                return null;
            }
            $newFeaturedProspect->featured_at = now();
            $newFeaturedProspect->save();

            return $newFeaturedProspect;

        }

        return $getFeaturedProspectOfTheMonth;
    }

    private function selectNewFeaturedProspect(): ?Prospect
    {
        return Prospect::
            notFeatured()
                ->whereHas('voters')
                ->with('voters.ideas')
                ->withSum('voters', 'votes.quantity')
                ->orderByDesc('voters_sum_votesquantity')
                ->first();

    }

    private function getNewFeaturedProspectOfTheMonth(): Prospect
    {
        $newMostVotedProspect = Prospect::with('voters')
            ->withSum('voters', 'votes.quantity')
            ->orderByDesc('voters_sum_votesquantity')
            ->first();

        return $newMostVotedProspect;
    }

    public function getFeaturedProspectOfTheMonth(): ?Prospect
    {
        return Prospect::orderBy('featured_at', 'desc')->first();
    }
}
