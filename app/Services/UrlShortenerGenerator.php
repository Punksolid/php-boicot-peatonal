<?php

namespace App\Services;

use App\Models\Link;
use Illuminate\Support\Facades\URL;
use Str;

class UrlShortenerGenerator
{
    public static function generate($url): string
    {
        $shortUrl = '1' . Str::random(5);

        $link = Link::create([
            'url' => $url,
            'slug' => $shortUrl,
        ]);

        return URL::to('/') . '/' . $shortUrl;
    }
}
