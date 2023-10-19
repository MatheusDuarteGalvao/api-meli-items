<?php

namespace Database\Factories;

use App\Enums\AdvertStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advert>
 */
class AdvertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'item_id' => 'MLB'.rand(3231707549, 3931707549),
            'status' => AdvertStatus::PENDING,
            'updated' => now(),
            'visits' => 0,
        ];
    }
}
