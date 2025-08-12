<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\TranslationTag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Translation>
 */
class TranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key_name' => $this->faker->unique()->slug(),
            'language_id' => Language::inRandomOrder()->first()->id ?? Language::factory(),
            'tag_id' => TranslationTag::inRandomOrder()->first()->id ?? TranslationTag::factory(),
            'content' => $this->faker->sentence(),
        ];
    }
}
