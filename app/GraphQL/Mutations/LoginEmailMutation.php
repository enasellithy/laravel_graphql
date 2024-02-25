<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\SOLID\Repositories\AuthRepository;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Auth;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class LoginEmailMutation extends Mutation
{
    private $auth;

    public function __construct(AuthRepository $auth)
    {
        $this->auth = $auth;
    }

    protected $attributes = [
        'name' => 'loginEmail',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return \GraphQL::type('LoginResult');
    }

    public function args(): array
    {
        return [
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The email of the user',
            ],
            'password' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The password of the user',
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return $this->auth->login_email($args);
    }
}
