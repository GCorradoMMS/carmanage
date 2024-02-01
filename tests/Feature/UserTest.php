<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_users(): void
    {
        User::factory()->count(5)->create();

        $response = $this->get('/api/v1/users');

        $response->assertStatus(200)->assertJsonCount(5, 'data');
    }


    public function test_show_user(): void
    {
        $user = User::factory()->create();

        $response = $this->get('/api/v1/users/' . $user->id);

        $response->assertStatus(200);

        $responseData = $response->json('data');
        $this->assertNotNull($responseData[0]['email']);
        $this->assertNotNull($responseData[0]['created_at']);
        $this->assertNotNull($responseData[0]['updated_at']);
        
    }

    public function test_store_user(): void
    {
        $userData = ['email' => 'test@example.com', 'password' => 'password'];

        $response = $this->post('/api/v1/users', $userData);

        $responseData = $response->json('data');
        $this->assertNotNull($responseData['id']);
        $this->assertNotNull($responseData['email']);
        $this->assertNotNull($responseData['created_at']);
        $this->assertNotNull($responseData['updated_at']);
    }

    public function test_update_user(): void
    {
        $user = User::factory()->create();

        $updateData = ['email' => 'updated@example.com'];

        $response = $this->put('/api/v1/users/' . $user->id, $updateData);

        $response->assertStatus(200);

        $responseData = $response->json('data');
        $this->assertNotNull($responseData['id']);
        $this->assertNotNull($responseData['email']);
        $this->assertNotNull($responseData['created_at']);
        $this->assertNotNull($responseData['updated_at']);
    }

    public function test_delete_user(): void
    {
        $user = User::factory()->create();

        $response = $this->delete('/api/v1/users/' . $user->id);

        $response->assertStatus(204);
    }

    public function test_get_all_user_cars(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
