<?php

namespace Database\Factories;

use App\Enums\Devices;
use App\Enums\Genders;
use App\Models\City;
use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $is_online = fake()->boolean();

        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'gender' => Genders::randomValue(),
            'nickname' => fake()->userName(),
            'status' => fake()->words(mt_rand(3, 10), true), 
            'is_online' => $is_online,
            'device' => Devices::randomValue(),
            'last_online_at' => $is_online ? null : fake()->dateTime(),
            'birthday' => fake()->dateTime(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'city_id' => randomOrCreate(City::class),
            'home_id' => randomOrCreate(Place::class),
            'alt_phone' => fake()->regexify('+\d (\d{3}) \d{3}-\d{2}-\d{2}'),
            'skype' => fake()->word(),
            'website' => fake()->url(),
            'notification_email' => fake()->safeEmail(),
            'password' => 'password',
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
