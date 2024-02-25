<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Rebing\GraphQL\Support\Mutation;
use Illuminate\Support\Facades\Auth;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Closure;

class LogoutMutation extends Mutation
{
    protected $attributes = [
        'name' => 'logout',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return Type::string();
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        Auth::guard('api')->user()->tokens()->delete();
        return 'Logout successful';

    }
}
