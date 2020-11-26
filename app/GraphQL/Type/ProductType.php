<?php

namespace App\GraphQL\Type;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'Product',
        'description'   => 'A product',
        'model'         => Product::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the product',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of product',
                'resolve' => function($root, $args) {
                    // If you want to resolve the field yourself,
                    // it can be done here
                    return $root->name;
                }
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of brand',
                'resolve' => function($root, $args) {
                    // If you want to resolve the field yourself,
                    // it can be done here
                    return $root->description;
                }
            ],
            'price' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The price of product',
                'resolve' => function($root, $args) {
                    // If you want to resolve the field yourself,
                    // it can be done here
                    return $root->price;
                }
            ],
            'category' => [
                'type' => GraphQL::type('category'),
                'description' => 'Category of the brand',
            ],
            'brand' => [
                'type' => GraphQL::type('brand'),
                'description' => 'brand that owns the product',
            ],
        ];
    }
}