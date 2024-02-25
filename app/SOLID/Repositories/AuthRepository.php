<?php

namespace App\SOLID\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    public function login_email(array $args)
    {
        $credentials = [
            'email' => $args['email'],
            'password' => $args['password'],
        ];


        if (Auth::attempt($credentials)) {
            $user = Auth::guard('api')->user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return [
                'token' => $token,
                'user' => $user,
            ];
        } else {
            return [
                'token' => '',
                'user' => null, // or any default value for the user field
            ];
        }
    }

    public function login_username(array $args)
    {
        $credentials = [
            'username' => $args['username'],
            'password' => $args['password'],
        ];


        if (Auth::attempt($credentials)) {
            $user = Auth::guard('api')->user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return [
                'token' => $token,
                'user' => $user,
            ];
        } else {
            return [
                'token' => '',
                'user' => null, // or any default value for the user field
            ];
        }
    }

    public function login_phone(array $args)
    {
        $credentials = [
            'phone' => $args['phone'],
            'password' => $args['password'],
        ];


        if (Auth::attempt($credentials)) {
            $user = Auth::guard('api')->user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return [
                'token' => $token,
                'user' => $user,
            ];
        } else {
            return [
                'token' => '',
                'user' => null, // or any default value for the user field
            ];
        }
    }

    public function register(array $args)
    {
        $user = User::create($args);
        if (Auth::attempt(['email' => $args['email'], 'password' => $args['password']])) {
            $user = Auth::guard('api')->user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return [
                'token' => $token,
                'user' => $user,
            ];
        } else {
            return [
                'token' => '',
                'user' => null, // or any default value for the user field
            ];
        }
    }
}
