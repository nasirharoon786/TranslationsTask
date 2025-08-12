<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TranslationTag>
 */
class TranslationTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tags = ['mobile', 'desktop', 'web'];
        return [
            'name' => $this->faker->unique()->randomElement($tags),
        ];
    }
}
