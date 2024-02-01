<?php

namespace Tests\Feature;

use Database\Factories\CarFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Car;
use Tests\TestCase;

class CarTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_cars()
    {
        Car::factory()->count(5)->create();

        $response = $this->get('/api/v1/cars');

        $response->assertStatus(200)->assertJsonCount(5, 'data');
    }

    public function test_show_car()
    {
        $car = Car::factory()->create();

        $response = $this->get('/api/v1/cars/' . $car->id);

        $response->assertStatus(200);

        $responseData = $response->json('data');
        $this->assertNotNull($responseData[0]['model']);
        $this->assertNotNull($responseData[0]['year']);
        $this->assertNotNull($responseData[0]['created_at']);
        $this->assertNotNull($responseData[0]['updated_at']);
    }

    public function test_store_car()
    {
        $carData = ['model' => 'Test Car', 'year' => 2022];

        $response = $this->post('/api/v1/cars', $carData);

        $response->assertStatus(200);

        $responseData = $response->json('data');
        $this->assertNotNull($responseData['id']);
        $this->assertNotNull($responseData['model']);
        $this->assertNotNull($responseData['year']);
        $this->assertNotNull($responseData['created_at']);
        $this->assertNotNull($responseData['updated_at']);
    }

    public function test_update_car()
    {
        $car = Car::factory()->create();

        $updateData = ['model' => 'Updated Car'];

        $response = $this->put('/api/v1/cars/' . $car->id, $updateData);

        $response->assertStatus(200);

        $responseData = $response->json('data');
        $this->assertNotNull($responseData['id']);
        $this->assertNotNull($responseData['model']);
        $this->assertNotNull($responseData['year']);
        $this->assertNotNull($responseData['created_at']);
        $this->assertNotNull($responseData['updated_at']);
    }

    public function test_delete_car()
    {
        $car = Car::factory()->create();

        $response = $this->delete('/api/v1/cars/' . $car->id);

        $response->assertStatus(204);
    }
}
