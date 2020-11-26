<?php

namespace App\GraphQL\Type;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CategoryType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'Category',
        'description'   => 'A category',
        'model'         => Category::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the category',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of category',
                'resolve' => function($root, $args) {
                    // If you want to resolve the field yourself,
                    // it can be done here
                    return $root->name;
                }
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of category',
                'resolve' => function($root, $args) {
                    // If you want to resolve the field yourself,
                    // it can be done here
                    return $root->description;
                }
            ],
        ];
    }
}