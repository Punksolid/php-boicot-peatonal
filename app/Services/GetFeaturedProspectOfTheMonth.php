<?php

namespace App\Services;

use App\Models\Prospect;

class GetFeaturedProspectOfTheMonth
{

    public function __invoke(): Prospect
    {
        $featured = Prospect::featured()->first();
        if ($featured) {
            return $featured;
        }
        return $this->selectNewFeaturedProspect();
    }

    private function selectNewFeaturedProspect(): Prospect
    {
        return Prospect::notFeatured()->first();
    }
}
