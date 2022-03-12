<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateVehicleTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function guests_users_can_not_create_vehicles()
    {

        $response = $this->post(route('vehicles.store'), [
            'plate' => 'FYQ90E',
            'brand' => 'Yamaha',
            'type' => 'Motocicleta'
        ]);
        $response->assertRedirect('login');

    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function an_authenticated_user_can_create_vehicle()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->postJson(route('vehicles.store'), [
            'plate' => 'FYQ90E',
            'brand' => 'Yamaha',
            'type' => 'Motocicleta'
        ]);

        $response->assertJson([
            'plate' => 'FYQ90E',
            'brand' => 'Yamaha',
            'type' => 'Motocicleta'
        ]);

        $this->assertDatabaseHas('vehicles', [
            'user_id' => $user->id,
            'plate' => 'FYQ90E',
            'brand' => 'Yamaha',
            'type' => 'Motocicleta'
        ]);
    }

    /** @test  */
    public function a_vehicle_require_a_plate()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->postJson(route('vehicles.store'), ['plate' => '']);

        $response->assertStatus(422); // 422 entidad no procesable

        $response->assertJsonStructure([
            'message', 'errors' => ['plate']
        ]);
    }

    /** @test  */
    public function a_vehicle_require_a_brand()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->postJson(route('vehicles.store'), ['brand' => '']);

        $response->assertStatus(422); // 422 entidad no procesable

        $response->assertJsonStructure([
            'message', 'errors' => ['brand']
        ]);
    }

    /** @test  */
    public function a_vehicle_require_a_type()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->postJson(route('vehicles.store'), ['type' => '']);

        $response->assertStatus(422); // 422 entidad no procesable

        $response->assertJsonStructure([
            'message', 'errors' => ['type']
        ]);
    }

    /** @test  */
    public function a_vehicle_plate_requires_a_minimum_length()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->postJson(route('vehicles.store'), ['plate' => 'asdf']);

        $response->assertStatus(422); // 422 entidad no procesable

        $response->assertJsonStructure([
            'message', 'errors' => ['plate']
        ]);
    }
}
