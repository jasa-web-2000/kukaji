<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventParticipant>
 */
class EventParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->where('status', 'accept')->first();

        $event = Event::inRandomOrder()->where('status', 'accept')->first();

        // Pastikan kombinasi user-event unik
        while (\App\Models\EventParticipant::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->exists()
        ) {
            $user = User::inRandomOrder()->first();
            $event = Event::inRandomOrder()->first();
        }

        return [
            'user_id' => $user->id,
            'event_id' => $event->id,
            'created_at' => $this->faker->dateTimeBetween('-4 days', 'now'),
        ];
    }
}
