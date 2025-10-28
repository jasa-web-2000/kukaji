<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->sentence(3);
        $statusOptions = ["pending", "reject", "accept"];

        return [
            'user_id' => \App\Models\User::where('role', '!=', 'user')
                ->where('status', 'accept')
                ->inRandomOrder()
                ->first()
                ->id ?? 1,

            'thumbnail' => $this->faker->imageUrl(640, 480, 'events', true),
            'name' => $name,
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->numberBetween(1, 1000),
            'status' => $this->faker->randomElement($statusOptions),
            'address' => $this->faker->address(),
            'date' => $this->faker->dateTimeBetween('-30 days', '+30 days'),

            'theme_id' => \App\Models\Theme::inRandomOrder()->first()->id ?? 1,
            'speaker_id' => \App\Models\Speaker::inRandomOrder()->first()->id ?? 1,

            'featured' => $this->faker->boolean(),
            'description' => $this->faker->paragraph(),
            'note' => $this->faker->optional()->sentence(),
            'created_at' => $this->faker->dateTimeBetween('-3 days', 'now'),
        ];
    }
}
