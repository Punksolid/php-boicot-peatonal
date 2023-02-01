<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;

    public function getImageUrlAttribute($value)
    {
        return $value ?? 'https://pbs.twimg.com/media/Ffcsaj4VEAUtcjc?format=jpg&name=large';
    }

    /**
     * @throws \Exception
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
