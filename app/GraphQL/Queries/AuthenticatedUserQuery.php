<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Auth;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class AuthenticatedUserQuery extends Query
{
    protected $attributes = [
        'name' => 'authenticatedUser',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return \GraphQL::type('User');
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Auth::guard('api')->user();
    }
}
