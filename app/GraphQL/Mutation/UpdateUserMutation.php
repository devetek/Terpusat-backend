<?php

namespace App\GraphQL\Mutation;

use Closure;
use Exception;
use App\Models\User;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateUser'
    ];

    public function type(): Type
    {
        return GraphQL::type('user');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'input' => [
                'type' => GraphQL::type('UserInput')
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        try {
            $user = User::find($args['id']);

            if (!$user) {
                return null;
            }

            if (@$args['input']['name']) {
                $user->name = $args['input']['name'];
            }

            if (@$args['input']['email']) {
                $user->email = $args['input']['email'];
            }

            if (@$args['input']['phone']) {
                $user->phone = $args['input']['phone'];
            }

            if (@$args['input']['password']) {
                $user->password = bcrypt($args['input']['password']);
            }


            $user->save();

            return $user;
        } catch (Exception $e) {
            return $e;
        }
    }
}
