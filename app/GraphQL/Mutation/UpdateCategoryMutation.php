<?php

namespace App\GraphQL\Mutation;

use Closure;
use Exception;
use App\Models\Category;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateCategory'
    ];

    public function type(): Type
    {
        return GraphQL::type('category');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'input' => [
                'type' => GraphQL::type('CategoryInput')
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        try {
            $category = Category::find($args['id']);;

            if (@$category) {
                if (@$args['input']['name']) {
                    $category->name = $args['input']['name'];
                }

                if (@$args['input']['description']) {
                    $category->description = $args['input']['description'];
                }

                $category->save();
            }

            return $category;
        } catch (Exception $e) {
            return $e;
        }
    }
}
