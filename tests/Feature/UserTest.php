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


}
