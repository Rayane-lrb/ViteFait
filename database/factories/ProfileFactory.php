<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Profile>
 */
class ProfileFactory extends Factory
{

protected $casts = [
    'is_private' => 'boolean'
];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->unique()->userName(),
            'birthday' => $this->faker->date(),
            'picture_path' => $this->faker->imageUrl(),
            'bio' => $this->faker->text(),
            'user_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
