<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class LoginResult extends GraphQLType
{
    protected $attributes = [
        'name' => 'LoginResult',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'token' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Authentication token',
            ],
            'user' => [
                'type' => \GraphQL::type('User'),
                'description' => 'The authenticated user',
            ],
        ];
    }
}
