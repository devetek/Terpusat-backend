<?php

namespace App\GraphQL\Type;

use App\Models\Brand;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class BrandType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'Brand',
        'description'   => 'A brand',
        'model'         => Brand::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the brand',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of brand',
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
            'company' => [
                'type' => GraphQL::type('company'),
                'description' => 'Company that owns the brand',
            ],
        ];
    }
}