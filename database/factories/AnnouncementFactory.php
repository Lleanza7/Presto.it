<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker-> sentence(2),
            'price' => $this->faker->randomFloat(2, 1, 9999),
            'description' => $this->faker->text(50),
            'category_id' => $this->faker->numberBetween(1, 9),
            'user_id' => $this->faker->numberBetween(1, 9),
        ];
    }
}
