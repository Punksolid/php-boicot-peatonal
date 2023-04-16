<?php

namespace App\Services;

use App\Models\Prospect;

class GetFeaturedProspectOfTheMonth
{

    public function __invoke(): ?Prospect
    {
        $getFeaturedProspectOfTheMonth = $this->getFeaturedProspectOfTheMonth();

        if (!$getFeaturedProspectOfTheMonth) {
            $newFeaturedProspect = $this->selectNewFeaturedProspect();

            if (!$newFeaturedProspect) {
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

    private function getFeaturedProspectOfTheMonth()
    {
        return Prospect::orderBy('featured_at', 'desc')->first();
    }
}
