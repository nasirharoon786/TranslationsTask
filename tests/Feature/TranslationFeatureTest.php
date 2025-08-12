<?php

namespace Tests\Feature;

use App\Models\Language;
use App\Models\User;
use App\Models\TranslationTag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TranslationFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Set up the test environment.
     */
    public function test_authenticated_user_can_create_translation()
    {
        $user = User::factory()->create();

        Sanctum::actingAs($user);

        $language = Language::factory()->create();
        $tag = TranslationTag::factory()->create();

        $payload = [
            'key_name' => 'greeting.hello',
            'content' => 'Hello World',
            'language_id' => $language->id,
            'tag_id' => $tag->id,
        ];

        $response = $this->postJson('/api/translations', $payload);

        $response->assertStatus(201)
            ->assertJsonFragment(['content' => 'Hello World']);
    }

    /**
     * Test that a guest cannot create a translation.
     */
    public function test_guest_cannot_create_translation()
    {
        $language = Language::factory()->create();
        $tag = TranslationTag::factory()->create();

        $payload = [
            'key_name' => 'greeting.hello',
            'content' => 'Hello World',
            'language_id' => $language->id,
            'tag_id' => $tag->id,
        ];

        $this->postJson('/api/translations', $payload)
            ->assertStatus(401);
    }

    /**
     * Test that an authenticated user can view translations.
     */
    public function test_authenticated_user_can_view_translations()
    {
        Sanctum::actingAs(User::factory()->create());

        $response = $this->getJson('/api/translations');

        $response->assertStatus(200);
    }

    /**
     * Test that a guest cannot view a translation.
     */
    public function test_guest_cannot_view_translation()
    {
        $response = $this->getJson('/api/translations');

        $response->assertStatus(401);
    }
}
