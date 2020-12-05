<?php

namespace App\GraphQL\Mutation;

use Closure;
use Exception;
use App\Models\Product;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateProductMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateProduct'
    ];

    public function type(): Type
    {
        return GraphQL::type('product');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'input' => [
                'type' => GraphQL::type('ProductInput')
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        try {
            $product = Product::find($args['id']);;

            if (@$product) {
                if (@$args['input']['name']) {
                    $product->name = $args['input']['name'];
                }

                if (@$args['input']['description']) {
                    $product->description = $args['input']['description'];
                }

                if (@$args['input']['brand_id']) {
                    $product->brand_id = $args['input']['brand_id'];
                }

                if (@$args['input']['category_id']) {
                    $product->category_id = $args['input']['category_id'];
                }

                $product->save();
            }

            return $product;
        } catch (Exception $e) {
            return $e;
        }
    }
}
