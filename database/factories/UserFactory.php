<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => fake()->name(),
            'username' => '@' . fake()->regexify('[a-z]{3}[0-9]{3}'),
            'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            // 'remember_token' => Str::random(10),
            'phone' => '62' . fake()->numberBetween(82384345, 89348745),
            'bio' => fake()->paragraph(1),
            'address' => fake()->paragraph(1),
            'gender' => fake()->randomElement(['male', 'female']),
            'role' => fake()->randomElement(['eo', 'user', 'admin']),
            'birthdate' => fake()->date(),
            'status' => fake()->randomElement(['pending', 'reject', 'accept']),
            'photo' => fake()->imageUrl(),
            'created_at' => $this->faker->dateTimeBetween('-5 days', 'now'),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
