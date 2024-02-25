<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LogoutMutationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testLogoutMutationSuccessfullyLogsOutUser()
    {
        // Perform a login action to get a user token
        $user = User::create([
            'username' => 'test',
            'phone' => '01200000',
            'email' => 'test@mail.com',
            'password' => '123456',
        ]);
        $token = $user->createToken('test-token')->plainTextToken;

        // Use the token to authenticate the user
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('POST', '/graphql', [
            'query' => 'mutation { logout }',
        ]);

        $response->assertJson([
            'data' => [
                'logout' => 'Logout successful',
            ],
        ]);

        // Add assertions as needed to test the logout behavior
    }
}
