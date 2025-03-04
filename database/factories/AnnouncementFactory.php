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
            'title' => $this->faker->sentence(6), // Generates a random title with 6 words
            'description' => $this->faker->paragraph(), // Generates a random paragraph
            'user_id' => 3, // Assigns a random user
            'address' => $this->faker->address(), // Generates a random address
            'Beds' => $this->faker->numberBetween(1, 10), // Random number of beds (1-10)
            'Baths' => $this->faker->numberBetween(1, 5), // Random number of baths (1-5)
            'sqft' => $this->faker->numberBetween(500, 5000), // Random square footage (500-5000)
            'type' => $this->faker->randomElement(['For Sale', 'For Rent']), // Random type selection
            'price' => $this->faker->randomFloat(2, 50000, 500000),
            'start_date' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random date within the past year
            'end_date' => $this->faker->dateTimeBetween('now', '+1 year'), // Random date within the next year
            'city' => $this->faker->city(), // Generates a random city name
        ];
    }
}
