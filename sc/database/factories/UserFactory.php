<?php

namespace Database\Factories;

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
        $array = array(
            "Klub Strzelectwa Sportowego LOK Bursztyn Kalisz",
            "Szczeciński Klub Strzelecki",
            "Bielsko-Bialski Klub Sportowy 'Blaster'"
        );
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'clubName' => $array[array_rand($array, 1)],
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
