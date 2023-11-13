<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    // // this will refresh the database
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function testCreateUser(){
        $user= User::factory()->create();

        $this->assertModelExists($user);
    }

    public function testUpdateUserAddress(){
        $user= User::factory()->create();
        $address= "address 1";
               
        $response = $this->actingAs($user)->put('/api/v1/user', [
            'address' => $address,
        ]);
    

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'address' => $address,
        ]);

    }

    public function testUpdatePhone(){
        $user=User::factory()->create();
        $phone= "phone testing";
        $response = $this->actingAs($user)->put('/api/v1/user', [
            'phone' => $phone,
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'phone' => $phone,
        ]);

    }

    public function testUserCanLogin(){
        $user = User::factory()->create([
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->postJson('/api/v1/login', [
            'email' => 'johndoe@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200);
        $response->assertSee("token");
    }

    public function testUserCanRegister(){
        $user = User::factory()->create([
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
            'name'=> 'john doe'
        ]);

        $response = $this->postJson('/api/v1/register', [
            'email' => 'johndoe@example.com',
            'password' => 'password',
            'name'=> 'john doe'
        ]);

        $response->assertStatus(200);
        $response->assertSee("token");
    }
}
