<?php

namespace App\GraphQL\Input;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class CategoryInput extends InputType
{
    protected $attributes = [
        'name' => 'categoryInput',
        'description' => 'Category input object'
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
                'rules' => ['min:5', 'max:1000']
            ],
        ];
    }
}