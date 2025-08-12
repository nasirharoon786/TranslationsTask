<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Translation;
use App\Models\TranslationTag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create 10 users
        User::factory(5)->create();

        // Create 10 languages
        Language::factory()->count(10)->create();

        // Create 5 tags
        TranslationTag::factory()->count(3)->create();

        // Create 100,000+ translations
        // Translation::factory()->count(100000)->create();
        
        // Massive translations: chunked!
        $batchSize = 10000;
        $total = 100000;

        for ($i = 0; $i < $total; $i += $batchSize) {
            Translation::factory()->count($batchSize)->create();
        }
    }
}
