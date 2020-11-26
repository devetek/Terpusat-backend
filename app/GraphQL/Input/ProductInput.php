<?php

namespace App\GraphQL\Input;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class ProductInput extends InputType
{
    protected $attributes = [
        'name' => 'productInput',
        'description' => 'Product input object'
    ];

    public function fields(): array
    {
        return [
            'name' => [
                'alias' => 'name',
                'description' => 'Name (250 max chars)',
                'type' => Type::string(),
                'rules' => ['min:3', 'max:250']
            ],
            'description' => [
                'alias' => 'description',
                'description' => 'Description (long string)',
                'type' => Type::string(),
                'rules' => ['min:20', 'max:1000']
            ],
            'price' => [
                'alias' => 'price',
                'description' => 'Price (integer)',
                'type' => Type::int(),
            ],
            'brand_id' => [
                'alias' => 'brand_id',
                'description' => 'Brand id (integer)',
                'type' => Type::int(),
            ],
            'category_id' => [
                'alias' => 'category_id',
                'description' => 'Category id (integer)',
                'type' => Type::int(),
            ],
        ];
    }
}