<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class LanguageFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that an authenticated user can create a language.
     */
    public function test_authenticated_user_can_create_language()
    {
        $user = User::factory()->create();

        Sanctum::actingAs($user);

        $payload = [
            'name' => 'English',
            'code' => 'en'
        ];

        $response = $this->actingAs($user, 'sanctum')
            ->postJson('/api/languages', $payload);

        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'English', 'code' => 'en']);

        $this->assertDatabaseHas('languages', $payload);
    }

    /**
     * Test that a guest cannot create a language.
     */
    public function test_guest_cannot_create_language()
    {
        $payload = [
            'name' => 'English',
            'code' => 'en'
        ];

        $this->postJson('/api/languages', $payload)
            ->assertStatus(401);
    }
}
