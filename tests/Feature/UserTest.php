<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testRegisterUser()
    {
       $this->post('/api/users', [
            'username' => 'jefriam01',
            'password' => 'password123',
            'name' => 'Jefri Achmad Maulana',
        ])->assertStatus(201)
            ->assertJson([
                "data" => [
                    'username' => 'jefriam01',
                    'name' => 'Jefri Achmad Maulana',
                ],
            ]);
    }

    public function testRegisterFailed(){
        $this->post('/api/users', [
            'username' => '',
            'password' => '',
            'name' => '',
        ])->assertStatus(400)
            ->assertJson([
                "errors" => [
                    'username' => ['The username field is required.'],
                    'password' => ['The password field is required.'],
                    'name' => ['The name field is required.'],
                ],
            ]);
    }

    public function testRegisterUsernameAlreadyExists()
    {

        $this->testRegisterUser(); // First register a user
        $this->post('/api/users', [
            'username' => 'jefriam01',
            'password' => 'newpassword123',
            'name' => 'Jefri Achmad Maulana Updated',
        ])->assertStatus(400)
            ->assertJson([
                "message" => "Username already exists",
                "errors" => [
                    "username" => ["The username has already been taken."],
                ],
            ]);
    }
}
