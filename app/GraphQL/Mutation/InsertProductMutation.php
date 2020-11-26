<?php

namespace App\GraphQL\Mutation;

use Closure;
use Exception;
use App\Models\Product;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class InsertProductMutation extends Mutation
{
    protected $attributes = [
        'name' => 'InsertProduct'
    ];

    public function type(): Type
    {
        return GraphQL::type('product');
    }

    public function args(): array
    {
        return [
            'input' => [
                'type' => GraphQL::type('ProductInput')
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        try {
            $product = new Product;
            
            $product->name = $args['input']['name'];
            $product->description = $args['input']['description'];
            $product->price = $args['input']['price'];
            $product->category_id = $args['input']['category_id'];
            $product->brand_id = $args['input']['brand_id'];
    
            $product->save();

            return $product;
        } catch(Exception $e) {
            return $e;
        }
    }
}