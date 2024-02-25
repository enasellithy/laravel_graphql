<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\SOLID\Repositories\AuthRepository;

class AuthRepositoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testLoginWithEmail()
    {
        $user = User::create([
            'username' => 'test',
            'phone' => '01200000',
            'email' => 'test@mail.com',
            'password' => '123456',
        ]);

        $repository = new AuthRepository();
        $result = $repository->login_email(['email' => 'test@mail.com', 'password' => '123456']);

        $this->assertNotEmpty($result['token']);
        $this->assertEquals($user->id, $result['user']->id);
    }

    public function testLoginWithUsername()
    {
        $user = User::create([
            'username' => 'test',
            'phone' => '01200000',
            'email' => 'test@mail.com',
            'password' => '123456',
        ]);

        $repository = new AuthRepository();
        $result = $repository->login_username(['username' => 'test', 'password' => '123456']);

        $this->assertNotEmpty($result['token']);
        $this->assertEquals($user->id, $result['user']->id);
    }

    public function testLoginWithPhone()
    {
        $user = User::create([
            'username' => 'test',
            'phone' => '01200000',
            'email' => 'test@mail.com',
            'password' => '123456',
        ]);

        $repository = new AuthRepository();
        $result = $repository->login_phone(['phone' => '01200000', 'password' => '123456']);

        $this->assertNotEmpty($result['token']);
        $this->assertEquals($user->id, $result['user']->id);
    }

    public function testRegister()
    {
        $userData = [
            'email' => 'test@mail.com',
            'password' => '123456',
            // Add other required fields
        ];

        $repository = new AuthRepository();
        $result = $repository->register($userData);

        $this->assertNotEmpty($result['token']);
        $this->assertEquals($userData['email'], $result['user']->email);
    }
}
