<?php

namespace App\GraphQL\Mutation;

use Closure;
use Exception;
use App\Models\User;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class InsertUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'InsertUser'
    ];

    public function type(): Type
    {
        return GraphQL::type('user');
    }

    public function args(): array
    {
        return [
            'input' => [
                'type' => GraphQL::type('UserInput')
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        try {
            $user = new User;

            $user->name = $args['input']['name'];
            $user->email = $args['input']['email'];
            $user->phone = $args['input']['phone'];
            $user->password = bcrypt($args['input']['password']);
    
            $user->save();
    
            return $user;
        } catch(Exception $e) {
            return $e;
        }
    }
}