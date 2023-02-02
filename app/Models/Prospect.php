<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_active',
        'has_bumps',
        'is_from_politician',
        'is_from_media',
        'is_from_business',
        'address',
        'city',
        'state',
        'country',
        'geo_location',
        'google_maps_link',
        'facebook_link',
        'reporter_email',
        'image_url',
    ];

    public function getImageUrlAttribute($value)
    {
//        @todo: remove this line when we have a proper image storage
        $value = str_replace('public', 'storage', $value);
        return $value ?? 'https://pbs.twimg.com/media/Ffcsaj4VEAUtcjc?format=jpg&name=large';
    }

    /**
     * @throws Exception
     */
    public function getVotesAttribute($value): int
    {
        return random_int(1, 99);
    }

    public function markFeatured()
    {
        $this->featured_at = now();
        $this->save();
    }
}
