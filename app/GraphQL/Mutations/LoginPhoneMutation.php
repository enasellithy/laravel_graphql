<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\SOLID\Repositories\AuthRepository;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class LoginPhoneMutation extends Mutation
{
    private $auth;

    public function __construct(AuthRepository $auth)
    {
        $this->auth = $auth;
    }

    protected $attributes = [
        'name' => 'loginPhone',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return GraphQL::type('LoginResult');
    }

    public function args(): array
    {
        return [
            'phone' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The phone of the user',
            ],
            'password' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The password of the user',
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return $this->auth->login_phone($args);
    }
}
