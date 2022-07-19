<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user()
    {
        $user = User::create([
            'name' => 'Teste',
            'email' => 'chiquinho@email.com',
            'password' => 'password',

        ]);
        $response = $this->actingAs($user)->get('/users');
    

        $response->assertStatus(200);
    }

    public function test_user_create()
    {
        $response = $this->post('/register', [
            'name' => 'Teste',
            'email' => 'teste@email.com',
            'password' => 'password22',
            'is_admin' => true,
        ]);
        $response->assertStatus(302);
        
}
}