<?php

namespace App\Services;

use App\Models\Prospect;

class GetFeaturedProspectOfTheMonth
{

    public function __invoke(): ?Prospect
    {
        $newFeatured = $this->selectNewFeaturedProspect();

        if (!$newFeatured) {
            return Prospect::notFeatured()->inRandomOrder()->first();
        }

        return $newFeatured;
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
}
