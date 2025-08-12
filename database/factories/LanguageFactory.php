<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Language>
 */
class LanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $languages = [
            'en' => 'English',
            'fr' => 'French',
            'es' => 'Spanish',
            'ur' => 'Urdu',
            'de' => 'German',
            'zh' => 'Chinese',
            'ja' => 'Japanese',
            'ar' => 'Arabic',
            'hi' => 'Hindi',
            'ru' => 'Russian',
            'pt' => 'Portuguese',
            // add more if you want
        ];

        // Pick a random language code and name pair
        $code = $this->faker->unique()->randomKey($languages);
        $name = $languages[$code];

        return [
            'code' => $code,
            'name' => $name,
        ];
    }
}
