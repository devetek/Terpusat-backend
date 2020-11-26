<?php

namespace App\GraphQL\Mutation;

use Closure;
use Exception;
use App\Models\Category;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class InsertCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'InsertCategory'
    ];

    public function type(): Type
    {
        return GraphQL::type('category');
    }

    public function args(): array
    {
        return [
            'input' => [
                'type' => GraphQL::type('CategoryInput')
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        try {
            $category = new Category;

            $category->name = $args['input']['name'];
            $category->description = $args['input']['description'];
    
            $category->save();

            return $category;
        } catch(Exception $e) {
            return $e;
        }
    }
}