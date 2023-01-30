<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prospect>
 */
class ProspectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'is_active' => $this->faker->boolean,
            'has_bumps' => $this->faker->boolean,
            'is_from_politician' => $this->faker->boolean,
            'is_from_media' => $this->faker->boolean,
            'is_from_business' => $this->faker->boolean,
            'Address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'geo_location' => $this->faker->address,
            'google_maps_link' => $this->faker->url,
            'facebook_link' => $this->faker->url,
            'reporter_email' => $this->faker->email,
            'image_url' => $this->faker->randomElement([
                'https://pbs.twimg.com/media/Ffcsaj4VEAUtcjc?format=jpg&name=large'
            ]),
        ];
    }
}
