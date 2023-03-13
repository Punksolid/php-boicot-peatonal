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
            'name' => $this->faker->name, //
            'description' => $this->faker->text, //
            'is_active' => $this->faker->boolean,
            'has_bumps' => $this->faker->boolean,
            'is_from_politician' => $this->faker->boolean,
            'is_from_media' => $this->faker->boolean,
            'is_from_business' => $this->faker->boolean,
            'google_maps_link' => 'https://goo.gl/maps/3H6iB9pUyfaroa1e8',
            'facebook_link' => 'https://www.facebook.com/SuKarne-104618378170102',
            'reporter_email' => $this->faker->email,
            'image_url' => $this->faker->randomElement([
                'https://pbs.twimg.com/media/Ffcsaj4VEAUtcjc?format=jpg&name=large'
            ]),
            'featured_at' => null
        ];
    }
}
