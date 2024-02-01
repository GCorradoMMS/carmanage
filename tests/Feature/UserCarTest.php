<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Car;
use App\Models\UserCar;
use Tests\TestCase;

class UserCarTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_associate_user_to_car()
    {
        $user = User::factory()->create();
        $car = Car::factory()->create();
    
        $response = $this->postJson('/api/v1/users/associate/cars', [
            'userId' => $user->id,
            'carId' => $car->id,
        ]);
    
        $response->assertStatus(201)
            ->assertJson(['message' => 'User associated with car successfully']);
    }

    public function test_disassociate_user_to_car()
    {
        $user = User::factory()->create();
        $car = Car::factory()->create();

        $userCar = UserCar::factory()->create([
            'user_id' => $user->id,
            'car_id' => $car->id,
        ]);

        $response = $this->deleteJson('/api/v1/users/disassociate/cars', [
            'userId' => $user->id,
            'carId' => $car->id,
        ]);

        $response->assertStatus(204);
    }

    public function test_get_user_cars()
    {   $user = User::factory()->create();
        $cars = Car::factory(3)->create();
    
        foreach ($cars as $car) {
            $response = $this->postJson('/api/v1/users/associate/cars', [
                'userId' => $user->id,
                'carId' => $car->id,
            ]);
        }
    
        $response = $this->getJson('/api/v1/users/' . $user->id . '/cars');
        $response->assertStatus(200)->assertJsonCount(3, 'data.0.user_cars');
    }
}
